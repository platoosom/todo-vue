<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Dashboard',[
            'currentUser' => Auth()->user(),
            'todoes' => Todo::all(), 
            'users' => User::where('id', '!=', Auth()->user()->id)->get(),
        ]);
    }
}
