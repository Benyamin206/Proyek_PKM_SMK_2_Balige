<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Imports\GuruImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gurus = Guru::with('user')->get(); // Mengambil semua guru beserta relasi user
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login');
        }
        return view('Role.Operator.Guru.index', compact('gurus', 'user'));
    }

    /**
     * Show the form for uploading Excel file.
     */
    public function upload()
    {
        return view('Role.Operator.Guru.upload'); // Pastikan ada view untuk upload
    }

    /**
     * Handle the Excel file upload.
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
    
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            try {
                // Menggunakan Maatwebsite Excel untuk membaca file
                Excel::import(new GuruImport, $request->file('file'));

                return redirect()->route('Operator.Guru.index')->with('success', 'Data guru berhasil diupload.');
            } catch (\Exception $e) {
                \Log::error('Error during import: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
            }
        } else {
            return redirect()->back()->with('error', 'File tidak valid atau gagal diupload.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Role.Operator.Guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:gurus',
            'password' => 'required|string|min:6',
        ]);

        // Buat pengguna (User )
        $user = User::create([
            'name' => $request->name,
            'email' => $request->nip, // Menggunakan NIP sebagai email
            'password' => bcrypt($request->password),
        ]);

        // Buat guru (Guru) dan hubungkan dengan pengguna
        Guru::create([
            'name' => $request->name,
            'nip' => $request->nip,
            'user_id' => $user->id,
            'password' => bcrypt($request->password), // Simpan password yang sudah di-hash
        ]);

        return redirect()->route('Operator.Guru.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $guru = Guru::with('user')->findOrFail($id); // Mengambil guru beserta relasi user
        return view('Role.Operator.Guru.show', compact('guru')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $guru = Guru::with('user')->findOrFail($id); // Mengambil guru beserta relasi user
        $user = auth()->user();
        return view('Role.Operator.Guru.edit', compact('guru', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:gurus,nip,' . $id,
            'password' => 'nullable|string|min:6',
        ]);

        $guru = Guru::findOrFail($id);
        $guru->name = $request->name;
        $guru->nip = $request->nip;

        if ($request->filled('password')) {
            $guru->password = bcrypt($request->password);
        }

        $guru->save(); // Simpan perubahan

        return redirect()->route('Operator.Guru.index')->with('success', 'Guru berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete(); // Menghapus guru dari database
        return redirect()->route('Operator.Guru.index')->with('success', 'Guru berhasil dihapus.');
    }
}