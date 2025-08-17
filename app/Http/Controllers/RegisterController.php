<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    function create()
    {
        return view('register.create');
    }

    function store(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        $file = $request->file('avatar');
        $path = Storage::disk('public')
            ->putFileAs(
                'avatars',
                $file,
                $user->id . '.' . $file->getClientOriginalExtension()
            );
        $user->avatar = $path;
        $user->save();

        Auth::login($user, true);

        return redirect()->route('home');
    }
}