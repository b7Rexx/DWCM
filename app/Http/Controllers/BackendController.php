<?php

namespace App\Http\Controllers;

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
                return redirect()->back()->with('success', 'Navbar added');
            }
        }

        return redirect()->back()->with('fail', 'Failed to add navbar');
    }
}
