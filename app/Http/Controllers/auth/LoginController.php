<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Валидация данных формы
        $validator = Validator::make($request->all(), [
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('login', 'password');

        $user=User::where('login', $credentials['login'])->first();

        // Проверка, существует ли пользователь с данным логином и пароль
        if(!$user || !Hash::check($credentials['password'], $user->password)){
            return back()->withErrors(['login'=>'неверный пароль или логин'])->withInput();
        }
        

        // Попытка аутентификации
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Регистрация новой сессии
            return redirect()->intended('/'); // Переход на запрашиваемую страницу или главную
        }

        // Сообщение об ошибке в случае неверного пароля
        return back()->withErrors(['password' => 'Неверный пароль'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
