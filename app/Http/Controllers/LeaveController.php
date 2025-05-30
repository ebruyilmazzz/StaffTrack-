<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;

class LeaveController extends Controller
{
public function index()
{
    $leaves = Leave::with('user')->latest()->get();
    return view('leaves.index', compact('leaves'));
}

public function create()
{
    return view('leaves.create');
}

public function store(Request $request)
{
    $request->validate([
        'leave_type' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'description' => 'nullable|string',
    ]);

    Leave::create([
        'user_id' => auth()->id(),
        'leave_type' => $request->leave_type,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'description' => $request->description,
        'status' => 'Beklemede',
    ]);

    return redirect()->route('leaves.index')->with('success', 'İzin talebiniz başarıyla gönderildi.');
}

public function approve($id)
{
    $leave = Leave::findOrFail($id);
    $leave->update([
        'status' => 'Onaylandı',
    ]);
    return redirect()->route('leaves.index')->with('success', 'İzin talebiniz onaylandı.');
}

public function reject($id)
{
    $leave = Leave::findOrFail($id);
    $leave->update([
        'status' => 'Reddedildi',
    ]);
    return redirect()->route('leaves.index')->with('success', 'İzin talebiniz reddedildi.');
}

public function edit($id)
{
    $leave = Leave::findOrFail($id);
    return view('leaves.edit', compact('leave'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'leave_type' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ]);

    $leave = Leave::findOrFail($id);
    $leave->update([
        'leave_type' => $request->leave_type,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'description' => $request->description,
    ]);
    
    return redirect()->route('leaves.index')->with('success', 'İzin talebiniz güncellendi.');
}

public function destroy($id)
{
    $leave = Leave::findOrFail($id);
    $leave->delete();
    
    return redirect()->route('leaves.index')->with('success', 'İzin talebiniz silindi.');
}
}
