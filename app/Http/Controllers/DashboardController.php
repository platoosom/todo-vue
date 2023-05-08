<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Inertia\Inertia;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Dashboard',[
            'userType' => Auth()->user()->usertype,
            'todoes' => Todo::all(), 
        ]);
    }
}
