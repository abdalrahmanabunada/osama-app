<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Cookie;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin.permission');
        $menu = $this->middleware('admin.menu');

        $co = Cookie::get('menu');
        //dd($co);
        View::share('menu', $co);
    }

}
