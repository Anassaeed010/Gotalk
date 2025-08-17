<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogoutRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LogoutRequest $request)
    {
         $request->validated( ) ;
         Auth::logout() ;
          return redirect()->route('home') ->with('success', 'تم تسجيل الخروج بنجاح'); 
    }
}
