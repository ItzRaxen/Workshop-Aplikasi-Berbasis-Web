<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::latest()->paginate(10);
        return view('page.positions.index', compact('positions'));
    }

    public function create()
    {
        return view('page.positions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:positions',
            'description' => 'nullable|string',
        ]);

        Position::create($request->all());

        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil ditambahkan.');
    }

    public function show(Position $position)
    {
        return view('page.positions.show', compact('position'));
    }

    public function edit(Position $position)
    {
        return view('page.positions.edit', compact('position'));
    }

    public function update(Request $request, Position $position)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:positions,name,' . $position->id,
            'description' => 'nullable|string',
        ]);

        $position->update($request->all());

        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil diperbarui.');
    }

    public function destroy(Position $position)
    {
        if ($position->employees()->count() > 0) {
             return redirect()->route('positions.index')->with('error', 'Jabatan tidak dapat dihapus karena masih digunakan oleh karyawan.');
        }

        $position->delete();

        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil dihapus.');
    }
}

