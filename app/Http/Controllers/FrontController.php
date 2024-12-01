<?php

namespace App\Http\Controllers;

use App\Http\Resources\FrontUserResource;
use App\Models\User;
use Inertia\Inertia;

class FrontController extends Controller
{
    public function index()
    {
        $users = User::orderBy('active', 'desc')->limit(10)->get();

        $usersCount = User::count();

        return Inertia::render('Welcome', [
            'users' => FrontUserResource::collection($users),
            'usersCount' => $usersCount,
        ]);
    }
}
