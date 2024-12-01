<?php

namespace App\Http\Controllers;

use App\Models\User;

class ActiveUserController extends Controller
{
    function toggleUserActivity($id)
    {
        $user = User::findOrfail($id);
        $user->active = !$user->active;
        $user->save();
    }
}
