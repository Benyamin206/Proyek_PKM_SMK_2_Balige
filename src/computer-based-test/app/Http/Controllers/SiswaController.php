<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use App\Models\Kelas;
use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::with('user')->get(); // Mengambil semua siswa beserta relasi user
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login');
        }
        return view('Role.Operator.Siswa.index', compact('siswa', 'user'));
    }

    /**
     * Show the form for uploading Excel file.
     */
    public function upload()
    {
        return view('Role.Operator.Siswa.index');
    }

    /**
     * Handle the Excel file upload.
     */
    public function import(Request $request)
    {
        \Log::info('Import method called. User ID: ' . auth()->id());
    
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
        
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            try {
                Excel::import(new SiswaImport, $request->file('file'));
                return redirect()->route('Operator.Siswa.index')->with('success', 'Data siswa berhasil diupload.');
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
        return view('Role.Operator.Siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nis' => 'required|string|max:255|unique:siswa',
            'password' => 'required|string|min:6',
        ]);

        // Buat pengguna (User  )
        $user = User::create([
            'name' => $request->name,
            'email' => $request->nis, // Menggunakan NIS sebagai email
            'password' => bcrypt($request->password),
        ]);

        // Buat siswa (Siswa) dan hubungkan dengan pengguna
        Siswa::create([
            'name' => $request->name,
            'nis' => $request->nis,
            'password' => bcrypt($request->password), // Simpan password yang sudah di-hash
        ]);

        return redirect()->route('Operator.Siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswa = Siswa::with('user')->findOrFail($id); // Mengambil siswa beserta relasi user
        return view('Role.Operator.Siswa.index', compact('siswa')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::with('user')->findOrFail($id); // Mengambil siswa beserta relasi user
        $user = auth()->user();
        return view('Role.Operator.Siswa.edit', compact('siswa', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'nis' => 'required|string|max:255|unique:siswa,nis,' . $siswa->id,
            'password' => 'nullable|string|min:6',
        ]);

        $siswa->name = $request->name;
        $siswa->nis = $request->nis;

        if ($request->filled('password')) {
            $siswa->password = bcrypt($request->password);
        }

        $siswa->save(); 

        $user = User::where('email', $siswa->nis)->first();
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->nis;
            if ($request->filled('password')) {
                $user->password = bcrypt($request->password);
            }
            $user->save();
        } else {
            \Log::warning("User  not found for siswa ID: {$id}");
        }

        return redirect()->route('Operator.Siswa.index')->with('success', 'Siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete(); // Menghapus siswa dari database
        return redirect()->route('Operator.Siswa.index')->with('success', 'Siswa berhasil dihapus.');
    }
}