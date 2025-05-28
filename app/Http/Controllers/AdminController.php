<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Admin paneli ana sayfasını gösterir
    public function index()
    {
        $user = Auth::admin();
        return view('admin.dashboard', compact('admin'));
    
    }
}