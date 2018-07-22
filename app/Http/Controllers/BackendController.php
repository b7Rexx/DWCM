<?php

namespace App\Http\Controllers;

use App\Content;
use App\Nav;
use App\Navbar;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    private $_data = [];
    private $_path = 'Backend.pages.';

    function __construct()
    {
        $this->_data['navbar'] = Navbar::all();
        $this->_data['nav'] = Nav::all();
    }

    function home()
    {
        return view($this->_path . 'home', $this->_data);
    }

    /*********************** NAVBAR ******************/
    function navbar()
    {
        return view($this->_path . 'navbar', $this->_data);
    }

    function navbarAdd()
    {
        return view($this->_path . 'navbarAdd', $this->_data);
    }

    function navbarAddAction(Request $request)
    {
        $data['name'] = $request->name;
        $data['dropdown'] = $request->dropdown;

        if ($request->dropdown == 0) {
            if ($last_id = Navbar::create($data)) {
                if (Nav::create(['name' => $request->name, 'navbar_id' => $last_id->id])) {
                    return redirect()->back()->with('success', 'Navbar added');
                }
            }
        } else {
            if (Navbar::create($data)) {
                return redirect()->back()->with('success', 'Navbar added !');
            }
        }

        return redirect()->back()->with('fail', 'Failed to add navbar !');
    }

    function navbarDelete($id)
    {
        if (Navbar::find($id)->delete()) {
            return redirect()->back()->with('success', 'Navbar deleted !');
        }
        return redirect()->back()->with('fail', 'Failed to delete navbar !');
    }


    /*********************** NAV ******************/

    function nav($id)
    {
        $this->_data['navDetail'] = Nav::find($id);
        return view($this->_path . 'nav', $this->_data);
    }

    function navAdd($id)
    {
        $this->_data['navbarDetail'] = Navbar::find($id);
        return view($this->_path . 'navAdd', $this->_data);
    }

    function navAddAction(Request $request)
    {
        $data['name'] = $request->name;
        $data['navbar_id'] = $request->navbar_id;
        if (Nav::create($data)) {
            return redirect()->back()->with('success', 'New Page added !');
        }
        return redirect()->back()->with('fail', 'Failed to add Page !');
    }

    function navDelete($id)
    {
        if (Nav::find($id)->delete()) {
            return redirect()->to(route('admin-home'));
        }
        return redirect()->back()->with('fail', 'Failed to delete page !');
    }


    /*********************** CONTENT ******************/

    function Content($type, $id)
    {
        $returnObj = Content::where('type', '=', $type)->where('nav_id', '=', $id)->get();

        foreach ($returnObj as $val) {
            $check = $val->id;
        }

        $data['type'] = $type;
        $data['nav_id'] = $id;

        if (empty($check)) {
            if ($last_id = Content::create($data)->id) {

                $this->_data['contentDetail'] = Content::find($last_id);
                return view($this->_path . 'content', $this->_data);

            } else {
                return redirect()->back();
            }
        }
        $this->_data['contentDetail'] = Content::find($check);
        return view($this->_path . 'content', $this->_data);

    }

    /***************************** BLOCK **********/

    function Block($type, $id)
    {

        return view($this->_path . 'block', $this->_data);
    }

}
