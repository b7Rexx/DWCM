<?php

namespace App\Http\Controllers;

use App\Audio;
use App\Block;
use App\Content;
use App\Gallery;
use App\Image;
use App\Main;
use App\Nav;
use App\Navbar;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BackendController extends Controller
{
    private $_data = [];
    private $_path = 'Backend.pages.';

    function __construct()
    {
        $this->_data['navbar'] = Navbar::all();
        $this->_data['nav'] = Nav::all();

        $main = Main::all();
        $arr = [];
        foreach ($main as $data) {
            $arr[$data->name] = $data->value;
        }
        $this->_data['main'] = $arr;

    }

    function home()
    {
        return view($this->_path . 'home', $this->_data);
    }

    function main()
    {
        $main = Main::all();
        $arr = [];
        foreach ($main as $data) {
            $arr[$data->name] = $data->value;
        }
        $this->_data['main'] = $arr;

        return view($this->_path . 'main', $this->_data);
    }

    function mainUpdate(Request $request)
    {
        $data['name'] = $request->name ?? '';
        $data['short_name'] = $request->short_name ?? '';
        $data['quote'] = $request->quote ?? '';
        $data['email'] = $request->email ?? '';
        $data['phone'] = $request->phone ?? '';
        $data['fb'] = $request->fb ?? '';
        $data['insta'] = $request->insta ?? '';
        $data['yt'] = $request->yt ?? '';

        if ($request->hasFile('logo')) {
            $logo = 'logo.' . $request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('images/logo/'), $logo);
            $insert = ['name' => 'logo', 'value' => $logo];

            if (Main::where('name', '=', 'logo')->first() !== null) {
                $image = Main::where('name', '=', 'logo')->value ?? '';
                $img_path = public_path('images/logo/' . $image);
                if (File::exists($img_path)) {
                    File::delete($img_path);
                }

                Main::where('name', '=', 'logo')->first()->update($insert);
            } else {
                Main::create($insert);
            }
        }

        foreach ($data as $key => $value) {
            $this->addMainData($key, $value);
        }
        return redirect()->back()->with('success', 'Updated website info !');
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

    function navbarStatusChange($id)
    {
        $stat = Navbar::find($id);
        foreach ($stat->nav as $nav) {
            $this->changeStatus($nav);
        }
        $this->changeStatus($stat);
        return redirect()->back();
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

    function navStatusChange($id)
    {
        $stat = Nav::find($id);
        $navbar = $stat->navbar;
        if (!$navbar->dropdown) {
            $this->changeStatus($navbar);
        }
        $this->changeStatus($stat);
        return redirect()->back();
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

    function updateListTitle(Request $request)
    {
        Content::find($request->id)->update(['name' => $request->list]);
        return redirect()->back()->with('success', 'List title updated !');
    }

    function ContentStatusChange($type, $id)
    {
        $updateStat = Content::where('nav_id', '=', $id)->where('type', '=', $type);

        if (!isset($updateStat->get()[0])) return redirect()->back();

        $change = $updateStat->get()[0]->status;
        if ($change == 0) {
            $change = 1;
        } else {
            $change = 0;
        }
        $updateStat->update(['status' => $change]);
        return redirect()->back();
    }


    /***************************** BLOCK **********/

    function Block($type, $id)
    {
        $this->_data['animation'] = [
            'fade-up', 'fade-down', 'fade-right', 'fade-left', 'flip-left', 'flip-right', 'flip-up', 'flip-down',
            'zoom-in', 'zoom-in-up', 'zoom-in-dowm', 'zoom-out', 'zoom-out-up', 'zoom-out-dowm', 'fade-up-right', 'fade-up-left', 'fade-down-right', 'fade-down-left',
            'zoom-in-left', 'zoom-in-right', 'zoom-out-left', 'zoom-out-right',

        ];
        $this->_data['contentDetail'] = Content::find($id);
        $this->_data['type'] = $type;
        return view($this->_path . 'block', $this->_data);
    }

    function BlockAction(Request $request)
    {
        $data['name'] = $request->name;
        $data['quote'] = $request->quote ? $request->quote : '';
        $data['detail'] = $request->detail ? $request->detail : '';
        $data['content_id'] = $request->content_id;
        $data['animation'] = $request->animation;

        $last_id = Block::create($data)->id;

        //Image handling
        if ($request->hasfile('image')) {

            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/upload/'), $imageName);

            Image::create(['title' => $imageName, 'block_id' => $last_id]);
        } elseif (!empty($request->select_image)) {
            Image::create(['title' => $request->select_image, 'block_id' => $last_id]);
        }

        if ($request->hasfile('audio')) {
            $audioName = time() . '.' . $request->audio->getClientOriginalExtension();
            $request->audio->move(public_path('audio'), $audioName);
            Audio::create(['title' => $audioName, 'block_id' => $last_id]);
        }

        if (isset($request->video)) {
            $video = explode('&', explode('=', $request->video)[1])[0];
            Video::create(['title' => $video, 'block_id' => $last_id]);
        }

        //gallery
        if ($request->hasfile('gallery')) {
            foreach ($request->gallery as $key => $gal) {
                $imageName = time() . '_' . $key . '.' . $gal->getClientOriginalExtension();
                $gal->move(public_path('images/gallery/'), $imageName);
                Gallery::create(['title' => $imageName, 'block_id' => $last_id]);
            }
        }


        return redirect()->back()->with('success', $request->type . ' Block added !');
    }

    function BlockDelete($type, $id)
    {
        $image = Block::find($id)->ImageData->title ?? '';
        $check = Image::where('title', '=', $image)->get();
        foreach ($check as $key => $item) {
            $val = $key;
        }
        if ($val < 1) {
            $img_path = public_path('images/upload/' . $image);
            if (File::exists($img_path)) {
                File::delete($img_path);
            }
        }

        Block::find($id)->delete();
        return redirect()->back()->with('fail', 'Block Deleted !');

    }

    function blockStatusChange($id)
    {
        $stat = Block::find($id);
        $this->changeStatus($stat);
        return redirect()->back();
    }


    //Status Change
    private function changeStatus($stat)
    {
        if ($stat->status == 1) {
            $change = 0;
        } else {
            $change = 1;
        }
        $stat->update(['status' => $change]);
    }

    private function addMainData($name, $value)
    {
        if (Main::where('name', '=', $name)->first() !== null) {
            Main::where('name', '=', $name)->first()->update(['name' => $name, 'value' => $value]);
        } else {
            Main::create(['name' => $name, 'value' => $value]);
        }
    }


    //CSS
    function cssAdmin()
    {
        return view($this->_path . 'cssAdmin', $this->_data);
    }

    function cssChange(Request $request)
    {
        if (!empty($request->head))
            $this->addMainData('csshead', $request->head);

        if (!empty($request->body))
            $this->addMainData('cssbody', $request->body);

//        if (!empty($request->animate))
        $this->addMainData('cssanimate', $request->animate ?? '');


        return redirect()->back()->with('success', 'css colors updated');
    }


}
