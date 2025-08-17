<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    function create()
    {

        return view('Login.create');

    }  // ما تم تعلمه: اي ميثود _> مهمهم 
// - إنشاء فورم تسجيل (Register Form) بالاستعانة بـ Request مخصص (Form Request).
// - في الـ Request تم إنشاء ميثود 'authorize' للتحكم في السماح بالعملية أو لا.
//   - إذا رجعت هذه الميثود false، فلن يتحقق شيء وتتوقف العملية عن العمل.
// - في الكنترولر استخدمنا هذا الـ Request للتحكم في البيانات وتنفيذ عمليات المصادقة (Auth).
// - الميثودز داخل الكنترولر توضح طريقة التعامل مع تسجيل الدخول/التسجيل باستخدام الـ Request.
 
    function store(LoginRequest $request)
    {
        if (Auth::attempt($request->validated(), true))
            return redirect()->route('home')->with('success', 'تم التسجيل بنجاح اسهرت وانورت ');



        return redirect()->back()->withInput($request->only('email'))
            ->withErrors(['email' => 'try again .']);
    }

}

