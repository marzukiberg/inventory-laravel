<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class Dashboard extends Controller
{
    public function index()
    {
        if (!Session::has('role')) {
            return redirect('/');
        }
        return view('admin/dashboard/index');
    }
}
