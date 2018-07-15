<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    private $_data = [];
    private $_path = 'Backend.pages.';

    function home()
    {
        return view($this->_path . 'home', $this->_data);
    }
}
