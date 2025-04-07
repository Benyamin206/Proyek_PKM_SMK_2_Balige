<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    //
// Menampilkan semua data Semester
public function index()
{
    $semesters = Semester::all();
    return response()->json($semesters);
}

// Menampilkan data Semester berdasarkan ID
public function show($id)
{
    $semester = Semester::find($id);
    
    if (!$semester) {
        return response()->json(['message' => 'Semester tidak ditemukan'], 404);
    }

    return response()->json($semester);
}

// Menambahkan data Semester baru
public function store(Request $request)
{
    $request->validate([
        'nama_semester' => 'required|string|max:255',
    ]);

    $semester = Semester::create([
        'nama_semester' => $request->nama_semester,
    ]);

    return response()->json($semester, 201);
}

// Mengupdate data Semester
public function update(Request $request, $id)
{
    $request->validate([
        'nama_semester' => 'required|string|max:255',
    ]);

    $semester = Semester::find($id);

    if (!$semester) {
        return response()->json(['message' => 'Semester tidak ditemukan'], 404);
    }

    $semester->update([
        'nama_semester' => $request->nama_semester,
    ]);

    return response()->json($semester);
}

// Menghapus data Semester
public function destroy($id)
{
    $semester = Semester::find($id);

    if (!$semester) {
        return response()->json(['message' => 'Semester tidak ditemukan'], 404);
    }

    $semester->delete();

    return response()->json(['message' => 'Semester berhasil dihapus']);
}
}
