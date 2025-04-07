<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    //
    // Menampilkan semua data TahunAjaran
    public function index()
    {
        $tahunAjarans = TahunAjaran::all();
        return response()->json($tahunAjarans);
    }

    // Menampilkan data TahunAjaran berdasarkan ID
    public function show($id)
    {
        $tahunAjaran = TahunAjaran::find($id);
        
        if (!$tahunAjaran) {
            return response()->json(['message' => 'Tahun Ajaran tidak ditemukan'], 404);
        }

        return response()->json($tahunAjaran);
    }

    // Menambahkan data TahunAjaran baru
    public function store(Request $request)
    {
        $request->validate([
            'tahun_ajaran' => 'required|string|max:255',
        ]);

        $tahunAjaran = TahunAjaran::create([
            'tahun_ajaran' => $request->tahun_ajaran,
        ]);

        return response()->json($tahunAjaran, 201);
    }

    // Mengupdate data TahunAjaran
    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun_ajaran' => 'required|string|max:255',
        ]);

        $tahunAjaran = TahunAjaran::find($id);

        if (!$tahunAjaran) {
            return response()->json(['message' => 'Tahun Ajaran tidak ditemukan'], 404);
        }

        $tahunAjaran->update([
            'tahun_ajaran' => $request->tahun_ajaran,
        ]);

        return response()->json($tahunAjaran);
    }

    // Menghapus data TahunAjaran
    public function destroy($id)
    {
        $tahunAjaran = TahunAjaran::find($id);

        if (!$tahunAjaran) {
            return response()->json(['message' => 'Tahun Ajaran tidak ditemukan'], 404);
        }

        $tahunAjaran->delete();

        return response()->json(['message' => 'Tahun Ajaran berhasil dihapus']);
    }
}
