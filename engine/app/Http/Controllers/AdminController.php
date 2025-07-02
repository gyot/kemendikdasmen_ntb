<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //  
    public function index()
    {
        return view('admin.home');
    }
    public function dashboard()
    {
        return view('admin.home');
    }
    public function settings()
    {
        return view('admin.settings');
    }
    public function users()
    {
        return view('admin.users');
    }
    public function reports()
    {
        return view('admin.reports');
    }
    public function logs()
    {
        return view('admin.logs');
    }
    public function notifications()
    {
        return view('admin.notifications');
    }
    public function profile()
    {
        return view('admin.profile');
    }
    public function help()
    {
        return view('admin.help');
    }
    public function support()
    {
        return view('admin.support');
    }
    public function feedback()
    {
        return view('admin.feedback');
    }
}
