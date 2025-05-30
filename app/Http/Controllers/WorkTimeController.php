<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkTime;
use Illuminate\Support\Facades\Auth;

class WorkTimeController extends Controller
{
    // Mesai ekleme formunu göster
    public function create()
    {
        return view('worktimes.create');
    }

    // Mesai verisini kaydet
    public function store(Request $request)
    {
        // Validation (zorunlu alanlar)
        $request->validate([
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        // Süre hesaplama (örnek)
        $start = strtotime($request->start_time);
        $end = strtotime($request->end_time);
        $duration = ($end - $start) / 3600; // saat cinsinden

        $workTime = new WorkTime();
        $workTime->personnel_id = Auth::user()->personnel_id; // user tablosundaki personnel_id
        $workTime->date = $request->date;
        $workTime->start_time = $request->start_time;
        $workTime->end_time = $request->end_time;
        $workTime->work_duration = $duration;
        $workTime->save();

        return redirect()->route('worktimes.index')->with('success', 'Mesai kaydı başarıyla eklendi.');
    }

    // Mesai listesi
    public function index()
    {
        // Kendi personelinin mesaileri
        $worktimes = WorkTime::where('personnel_id', Auth::user()->personnel_id)->get();

        return view('worktimes.index', compact('worktimes'));
    }
}
