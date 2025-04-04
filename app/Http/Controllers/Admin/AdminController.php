<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\schedule;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $starts = schedule::all();
        $users = User::all(); // Получаем всех пользователей из базы данных
        return view('admin.users',[
            'users' => $users, 
            'starts' => $starts
        ]); // Возвращаем представление с переданными пользователями
    }
    
    public function Schedule()
    {
        $users = User::all();
        return view('admin.Schedule', compact('users'));
    }
    public function Documents()
    {
        return view('admin.documents');
    }
    
    public function Card()
    {
        return view('rieltor.card');
    }
    public function Client()
    {
        return view('rieltor.Client');
    }
    public function MySchedule()
    {
        return view('rieltor.MySchedule');
    }
}

