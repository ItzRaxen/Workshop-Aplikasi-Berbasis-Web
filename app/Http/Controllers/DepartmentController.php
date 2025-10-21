<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::latest()->paginate(10);
        return view('page.department.index', compact('departments'));
    }

    public function create()
    {
        return view('page.department.create');
    }

    public function store(Request $request)
    {
  
    $validatedData = $request->validate([
        'nama_departemen' => 'required|string|max:255|unique:departments,nama_departemen', 
        'description' => 'nullable|string',
    ]);
    \App\Models\Department::create($validatedData);
    return redirect()->route('departments.index')->with('success', 'Departemen berhasil ditambahkan!');
    }
    public function show(Department $department)
    {
        return view('page.department.show', compact('department'));
    }

    public function edit(Department $department)
    {
        return view('page.department.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    { 
        $validatedData = $request->validate([
            'nama_departemen' => 'required|string|max:255|unique:departments,nama_departemen,' . $department->id,
            'description' => 'nullable|string',
        ]);
        $department->update($validatedData);

        return redirect()->route('departments.index')->with('success', 'Departemen berhasil diperbarui.');
    }

    public function destroy(Department $department)
    {
        if ($department->employees()->count() > 0) {
            return redirect()->route('departments.index')->with('error', 'Departemen tidak dapat dihapus karena masih memiliki karyawan.');
        }

        $department->delete();

        return redirect()->route('departments.index')->with('success', 'Departemen berhasil dihapus.');
    }
}
