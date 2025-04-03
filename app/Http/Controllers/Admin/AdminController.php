<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        return view('admin.users');
    }
    
    public function Schedule()
    {
        return view('admin.Schedule');
    }
    public function Documents()
    {
        return view('admin.documents');
    }
}

