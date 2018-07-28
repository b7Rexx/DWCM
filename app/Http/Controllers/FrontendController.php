<?php

namespace App\Http\Controllers;

use App\Block;
use App\Content;
use App\Main;
use App\Nav;
use App\Navbar;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    private $_path = 'Frontend.';
    private $_data = [];

    function __construct()
    {
        $main = Main::all();
        $arr = [];
        foreach ($main as $data) {
            $arr[$data->name] = $data->value;
        }
        $this->_data['main'] = $arr;
    }

    function main($navbar = '', $nav = '', $block = '', $action = '')
    {
        if (empty($this->_data['main']['name'])) return redirect()->to(route('admin-main'));

        if (empty($nav)) {
            $check = Nav::where('status', '=', '1')->first();
            if (!$check) {
                return redirect()->to(route('admin-add-navbar'));
            }
            $nav = $check->id;
        }

        if (!$this->navbar($navbar))
            return redirect()->to(route('home'));

        if (!$this->nav($nav))
            return redirect()->to(route('home'));

        $this->content($nav);
        $this->block($block);

        $this->_data['data'] = [$navbar, $nav, $block, $action];

        if ($block != '')
            return view($this->_path . 'blockDetail', $this->_data);

        return view($this->_path . 'main', $this->_data);

    }

    private function navbar($id)
    {
        if (!empty($id)) {
            $check = Navbar::where('id', '=', $id)->where('status', '=', '1')->first();
            if (empty($check))
                return false;
            $this->_data['navbar_select'] = $check;
        }
        $this->_data['navbar'] = Navbar::where('status', '=', '1')->get();
        return true;
    }

    private function nav($id)
    {
        if (!empty($id)) {
            $check = Nav::where('id', '=', $id)->where('status', '=', '1')->first();
            if (empty($check))
                return false;
            $this->_data['nav_select'] = $check;
        }

        $this->_data['nav'] = Nav::where('status', '=', '1')->get();
        return true;
    }


    private function content($id)
    {
        if (!empty($id)) {
            $content = Content::where('nav_id', '=', $id)->where('status', '=', '1')->get();
            foreach ($content as $val) {
                $this->_data[$val->type] = $val;
            }
        }
    }


    private function block($id)
    {
        if (!empty($id)) {
            $this->_data['block'] = Block::where('id', '=', $id)->where('status', '=', '1')->get();
        } else {
            $this->_data['block'] = [];
        }
    }

    public function searchKey(Request $request)
    {
        if (!$this->navbar(''))
            return redirect()->to(route('home'));

        if (!$this->nav(''))
            return redirect()->to(route('home'));

        $keyword = $request->k;
        $this->_data['key'] = $keyword;
        $this->_data['searchList'] = Block::where('name', 'like', '%' . $keyword . '%')->get();
        return view($this->_path . 'search', $this->_data);
    }
}
