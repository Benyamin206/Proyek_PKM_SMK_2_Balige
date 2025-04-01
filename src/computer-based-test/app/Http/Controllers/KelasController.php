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
        $kelas = Kelas::with('user')->get(); // Mengambil semua data kelas dari database
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login');
        }

        return view('Role.Operator.Kelas.index', compact('kelas', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login');
        }

        return view('Role.Operator.Kelas.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255|unique:kelas',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'user_id' => auth()->id(), // Mengaitkan kelas dengan user yang sedang login
        ]);

        return redirect()->route('Operator.Kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kelas = Kelas::with('user')->findOrFail($id); // Mengambil data kelas berdasarkan ID
        return view('Role.Operator.Kelas.show', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelas = Kelas::findOrFail($id); // Mengambil data kelas berdasarkan ID
        $user = auth()->user();
        return view('Role.Operator.Kelas.edit', compact('kelas', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255|unique:kelas,nama_kelas,' . $id,
        ]);

        $kelas = Kelas::findOrFail($id); // Mengambil data kelas berdasarkan ID
        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
        ]);

        return redirect()->route('Operator.Kelas.index')->with('success', 'Kelas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelas = Kelas::findOrFail($id); // Mengambil data kelas berdasarkan ID
        $kelas->delete(); // Menghapus kelas

        return redirect()->route('Operator.Kelas.index')->with('success', 'Kelas berhasil dihapus.');
    }
}