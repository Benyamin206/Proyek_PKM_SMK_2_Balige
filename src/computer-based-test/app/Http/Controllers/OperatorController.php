<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Operator; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class OperatorController extends Controller
{
    public function index()
    {
        $operators = Operator::all();
        $users = auth()->user();
    
        return view('Role.Admin.Akun.index', compact('operators', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = Role::where('name', 'Operator')->first();
        return view('Role.Admin.Akun.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'durasi' => 'integer',
        ]);
        
        try {
            // Create user first
            $user = User::create([
                'name' => $request->nama_sekolah,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
    
            // Assign role to the user
            $user->assignRole('Operator');
    
            // Create operator with the user_id
            $operator = Operator::create([
                'nama_sekolah' => $request->nama_sekolah,
                'email' => $request->email,
                'password' => bcrypt($request->password), // Store password if needed
                'durasi' => $request->durasi ?? 12,
                'user_id' => $user->id, // Use the newly created user's ID
            ]);
    
            return redirect()->route('Admin.Akun.index')->with('success', 'Akun operator berhasil dibuat.');
        } catch (\Exception $e) {
            Log::error('Error creating operator: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to create operator.']);
        }
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $operator = Operator::findOrFail($id);
        return view('Role.Admin.Akun.index', compact('operator'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $operators = Operator::findOrFail($id);
        $users = auth()->user();
    
        return view('Role.Admin.Akun.edit', compact('operators', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Log::info("Updating operator with ID: {$id}");
        
        $request->validate([
            'nama_sekolah' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:operators,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'status_aktif' => 'in:aktif,tidak aktif',
        ]);
        
        $operator = Operator::findOrFail($id);

        $operator->update([
            'nama_sekolah' => $request->filled('nama_sekolah') ? $request->nama_sekolah : $operator->nama_sekolah,
            'email' => $request->filled('email') ? $request->email : $operator->email,
            'password' => $request->filled('password') ? bcrypt($request->password) : $operator->password,
            'status_aktif' => $request->filled('status_aktif') ? $request->status_aktif : $operator->status_aktif,
        ]);

        $user = User::findOrFail($operator->user_id); 
        $user->update([
            'name' => $request->filled('nama_sekolah') ? $request->nama_sekolah : $user->name,
            'email' => $request->filled('email') ? $request->email : $user->email,
            'password' => $request->filled('password') ? bcrypt($request->password) : $user->password,
        ]);
        
        return redirect()->route('Admin.Akun.index')->with('success', 'Akun operator berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $operator = Operator::findOrFail($id);
        $operator->delete(); 
        return redirect()->route('Admin.Akun.index')->with('success', 'Akun operator berhasil dihapus.');
    }
}