<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserRelationshipController extends Controller
{
    function followers($userId)
    {
        $user = User::findOrFail($userId);
      $followers = $user->followers;  {
            return response()->json($followers);
        }
    }
    function followees($userId)
    {

        $user = User::findOrFail($userId);
          $followees = $user->following; ;

        return response()->json($followees);
    }
}
