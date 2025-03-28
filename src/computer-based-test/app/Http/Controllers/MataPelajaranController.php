<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mataPelajarans = MataPelajaran::with(['kurikulum', 'user'])->get();
        return view('Role.Operator.Mapel.index', compact('mataPelajarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Role.Operator.Mapel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_mata_pelajaran' => 'required|unique:mata_pelajarans',
            'kurikulum_id' => 'required|exists:kurikulums,id',
            'user_id' => 'required|exists:users,id',
        ]);

        MataPelajaran::create($request->all());

        return redirect()->route('Operator.MataPelajaran.index')
            ->with('success', 'Mata Pelajaran created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MataPelajaran $mataPelajaran)
    {
        return view('Role.Operator.Mapel.index', compact('mataPelajaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MataPelajaran $mataPelajaran)
    {
        return view('Role.Operator.Mapel.edit', compact('mataPelajaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MataPelajaran $mataPelajaran)
    {
        $request->validate([
            'nama_mata_pelajaran' => 'required|unique:mata_pelajarans,nama_mata_pelajaran,' . $mataPelajaran->id,
            'kurikulum_id' => 'required|exists:kurikulums,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $mataPelajaran->update($request->all());

        return redirect()->route('Operator.MataPelajaran.index')
            ->with('success', 'Mata Pelajaran updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MataPelajaran $mataPelajaran)
    {
        $mataPelajaran->delete();

        return redirect()->route('Operator.MataPelajaran.index')
            ->with('success', 'Mata Pelajaran deleted successfully.');
    }
}