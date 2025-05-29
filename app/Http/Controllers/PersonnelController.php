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

    $validated['photo'] = 'default.png';
    $validated['created_at'] = now();
    $validated['updated_at'] = now();

    Personnel::create($validated);

    return redirect()->route('personnel.index')->with('success', 'Personel başarıyla eklendi.');
}

    public function edit($id)
    {
        $person=Personnel::findOrFail($id);
        $departments = Department::all();
        return view('personnel.edit', compact('person', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $person=Personnel::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'department_id' => 'required|integer',
            'tc_no' => 'required|string|max:11|unique:personnel,tc_no',
            'email' => 'required|email|unique:personnel,email',
            'phone' => 'required|string|max:15',
            'birthday_date' => 'required|date',
            'gender' => 'required|string|max:1',
            'position' => 'required|string|max:255',
            'starts_date' => 'required|date',
            'status' => 'required|string|max:1',
        ]);
        $person->update($validated);
        return redirect()->route('personnel.index')->with('success', 'Personel başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $person=Personnel::findOrFail($id);
        $person->delete();
        return redirect()->route('personnel.index')->with('success', 'Personel başarıyla silindi.');
    }


    public function updatePhoto(Request $request, $id)
    {
    $person=Personnel::findOrFail($id);
    if ($request->hasFile('photo')) {
        if ($person->photo && \Storage::exists('public/personnel/' . $person->photo)) {
            \Storage::delete('public/personnel/' . $person->photo);
        }
    
        $file = $request->file('photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/personnel', $filename);
        $person->photo = $filename;
    }
    $person->save();
    return redirect()->route('personnel.index')->with('success', 'Personel fotoğrafı başarıyla güncellendi.');
    }
}
