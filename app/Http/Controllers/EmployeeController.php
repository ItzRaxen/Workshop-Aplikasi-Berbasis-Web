<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Department; 
use App\Models\Position; 

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with(['department', 'position'])->latest()->paginate(5);
        return view('page.employees.index', compact('employees')); 
    }

    public function create()
    {
        $departments = Department::all(); 
        $positions = Position::all(); 
        return view('page.employees.create', compact('departments', 'positions')); 
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'email'         => 'required|email|max:255|unique:employees,email',
            'nomor_telepon' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat'        => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'status'        => 'required|string|max:50',
            'department_id' => 'required|integer|exists:departments,id', 
            'position_id'   => 'required|integer|exists:positions,id', 
        ]);
        
        Employee::create($validatedData);

        return redirect()
            ->route('employees.index')
            ->with('success', 'Pegawai berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $employee = Employee::with(['department', 'position'])->findOrFail($id); 
        return view('page.employees.show', compact('employee'));
    }

    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all(); 
        $positions = Position::all(); 
        
        return view('page.employees.edit', compact('employee', 'departments', 'positions'));
    }

    public function update(Request $request, string $id)
    {
        $employee = Employee::findOrFail($id);

        $validatedData = $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'email'         => 'required|email|max:255|unique:employees,email,' . $employee->id,
            'nomor_telepon' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat'        => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'status'        => 'required|string|max:50',
            'department_id' => 'required|integer|exists:departments,id', 
            'position_id'   => 'required|integer|exists:positions,id',
        ]);

        $employee->update($validatedData);

        return redirect()
            ->route('employees.index')
            ->with('success', 'Data pegawai berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()
            ->route('employees.index')
            ->with('success', 'Data pegawai berhasil dihapus!');
    }
}