<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Personnel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PersonnelController extends Controller
{
public function dashboard()
{
    $personnel = Personnel::findOrFail(Auth::user()->id);

    $working_hours = DB::table('working_hours')
        ->where('personel_id', $personnel->id)
        ->orderBy('date', 'desc')
        ->limit(10)
        ->get();

    return "Dashboard çalışıyor!";
}
}
