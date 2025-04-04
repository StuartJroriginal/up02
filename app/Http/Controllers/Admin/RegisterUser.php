<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterUser extends Controller
{
    public function showRegistrForm(){
        return view('admin.registr');
    }
    
    public function registr(Request $request){
        $validator = Validator::make($request->all(),
        [
            'lastname'=>'required|string|max:255',
            'firstname'=>'required|string|max:255',
            'patronymic'=>'required|string|max:255',
            'id_role'=>'required|integer|in:1, 2, 3',
            'login'=>'required|string|max:255',
            'password'=>'required|string|min:8|max:255|confirmed',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        
        User::create([
            'lastname'=> $request->lastname,
            'firstname'=> $request->firstname,
            'patronymic'=> $request->patronymic,
            'id_role'=> $request->id_role,
            'login'=> $request->login,
            'password'=> Hash::make($request->password),
        ]);
        return redirect()->route('admin.users');
    }
}
