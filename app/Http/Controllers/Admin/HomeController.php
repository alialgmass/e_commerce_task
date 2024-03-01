<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Client;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }
}
