<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kurikulums = Kurikulum::with('user')->get(); // Mengambil semua data kurikulum dari database
        return view('Role.Operator.Kurikulum.index', compact('kurikulums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Role.Operator.Kurikulum.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kurikulum' => 'required|string|max:255|unique:kurikulums',
            'user_id' => 'required|exists:users,id',
        ]);

        Kurikulum::create($request->only(['nama_kurikulum', 'user_id'])); // Simpan kurikulum ke database

        return redirect()->route('Operator.Kurikulum.index')->with('success', 'Kurikulum berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kurikulum = Kurikulum::with('user')->findOrFail($id); // Mengambil data kurikulum berdasarkan ID
        return view('Role.Operator.Kurikulum.show', compact('kurikulum'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kurikulum = Kurikulum::findOrFail($id); // Mengambil data kurikulum berdasarkan ID
        return view('Role.Operator.Kurikulum.edit', compact('kurikulum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kurikulum' => 'required|string|max:255|unique:kurikulums,nama_kurikulum,' . $id,
            'user_id' => 'required|exists:users,id',
        ]);

        $kurikulum = Kurikulum::findOrFail($id); // Mengambil data kurikulum berdasarkan ID
        $kurikulum->update($request->only(['nama_kurikulum', 'user_id'])); // Update kurikulum di database

        return redirect()->route('Operator.Kurikulum.index')->with('success', 'Kurikulum berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kurikulum = Kurikulum::findOrFail($id); // Mengambil data kurikulum berdasarkan ID
        $kurikulum->delete(); // Menghapus kurikulum

        return redirect()->route('Operator.Kurikulum.index')->with('success', 'Kurikulum berhasil dihapus.');
    }
}