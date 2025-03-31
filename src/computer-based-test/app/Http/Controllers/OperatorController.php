<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Operator; 
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Spatie\Permission\Models\Role;

class OperatorController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://localhost:8080/', 
        ]);
    }

    public function index()
    {
        $response = $this->client->get('operators');
        $users = auth()->user();
        $data = json_decode($response->getBody()->getContents(), true);
        if (isset($data['data'])) {
            $operators = $data['data'];
        } else {
            $operators = [];
        }
    
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
            'durasi' => 'required|integer',
        ]);

        $user = User::create([
            'name' => $request->nama_sekolah,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $operator = Operator::create([
            'nama_sekolah' => $request->nama_sekolah,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_id' => $user->id, 
            'durasi' => $request->durasi, 
        ]);
        $user->assignRole('Operator');
    
        return redirect()->route('Admin.Akun.index')->with('success', 'Akun operator berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = $this->client->get("operators/{$id}");
        $operator = json_decode($response->getBody()->getContents(), true)['data'];
        return view('Role.Admin.Akun.show', compact('operator'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response = $this->client->get("operators/{$id}");
        $operator = json_decode($response->getBody()->getContents(), true)['data'];
        return view('Role.Admin.Akun.edit', compact('operator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        // Update operator melalui API Go
        $response = $this->client->put("operators/{$id}", [
            'json' => [
                'nama_sekolah' => $request->nama_sekolah,
                'email' => $request->email,
                'password' => $request->filled('password') ? bcrypt($request->password) : null,
            ]
        ]);

        return redirect()->route('Admin.Akun.index')->with('success', 'Akun operator berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = $this->client->delete("operators/{$id}");
        return redirect()->route('Admin.Akun.index')->with('success', 'Akun operator berhasil dihapus.');
    }
}