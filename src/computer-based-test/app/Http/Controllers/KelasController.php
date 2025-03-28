<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all(); 
        return view('Role.Operator.Kelas.index', compact('kelas')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Role.Operator.Kelas.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255|unique:kelas',
            'user_id' => 'required|exists:users,id',
        ]);

        Kelas::create($request->all());

        return redirect()->route('Operator.Kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        return view('Role.Operator.Kelas.index', compact('kelas')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        return view('Role.Operator.Kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255|unique:kelas,nama_kelas,' . $kelas->id,
            'user_id' => 'required|exists:users,id',
        ]);

        $kelas->update($request->all());

        return redirect()->route('Operator.Kelas.index')->with('success', 'Kelas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect()->route('Operator.Kelas.index')->with('success', 'Kelas berhasil dihapus.');
    }
}