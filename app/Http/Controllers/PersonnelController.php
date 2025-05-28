<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnel;
use Illuminate\Support\Facades\Auth;
use App\Models\Department;

class PersonnelController extends Controller

{
    public function index()
{
    $personnel = Personnel::with('department')->get();
    return view('personnel.index', compact('personnel'));
}

    public function dashboard()
    {
        $user = Auth::user();

        $personnel = Personnel::with('department')->get();
        $working_hours = [
            '09:00 - 12:00',
            '13:00 - 18:00',
        ];

        return view('personnel.dashboard', compact('user', 'working_hours', 'personnel'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('personnel.create', compact('departments'));
    }  

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'department_id' => 'required|integer|exists:departments,id',
        'tc_no' => 'required|digits:11|unique:personnel,tc_no',
        'email' => 'required|email|unique:personnel,email',
        'phone' => 'required|string|max:15',
        'birthday_date' => 'required|date',
        'gender' => 'required|in:Kadın,Erkek',
        'position' => 'required|string|max:255',
        'starts_date' => 'required|date',
        'status' => 'required|in:Aktif,Pasif',
    ]);

    // Resim varsayılan olarak ayarlanıyor
    $validated['photo'] = 'default.png';
    $validated['created_at'] = now();
    $validated['updated_at'] = now(); // 'update_at' değil, 'updated_at' olmalı

    Personnel::create($validated);

    return redirect()->route('personnel.index')->with('success', 'Personel başarıyla eklendi.');
}

    public function edit($id)
    {
        $personel=Personnel::findOrFail($id);
        $person = Personnel::findOrFail($id);
        return view('personnel.edit', compact('person'));
    }

    public function update(Request $request, $id)
    {
        $personel=Personnel::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'department_id' => 'required|integer',
            'tc_no' => 'required|string|max:11',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'birthday_date' => 'required|date',
            'gender' => 'required|string|max:1',
            'position' => 'required|string|max:255',
            'starts_date' => 'required|date',
            'status' => 'required|string|max:1',
        ]);
        $personel->update($validated);
        return redirect()->route('personnel.index')->with('success', 'Personel başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $personel=Personnel::findOrFail($id);
        $personel->delete();
        return redirect()->route('personnel.index')->with('success', 'Personel başarıyla silindi.');
    }
}
