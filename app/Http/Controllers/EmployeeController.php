<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function create(Request $request)
    {
        try {
            $customMessages = [
                'required' => 'Не все данные введены',
                'email' => 'Email введен неверно',
                'unique' => 'Такой сотрудник уже есть',
            ];

            $validatedData = $request->validate([
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ], $customMessages);

            User::insert([
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
            ]);

            return back()->with(['success' => 'Сотрудник создан']);
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended('hours/vvod');
        }

        return back()->withErrors(['email' => 'Неверный email или пароль'])->withInput();
    }
}
