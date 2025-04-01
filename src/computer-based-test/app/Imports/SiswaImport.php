<?php

namespace App\Imports;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Spatie\Permission\Models\Role;
use Maatwebsite\Excel\Concerns\WithValidation;

class SiswaImport implements ToModel, WithStartRow, WithValidation
{
    public function startRow(): int
    {
        return 2;
    }

    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (empty($row[0]) || empty($row[1]) || empty($row[2])) {
            \Log::warning('Data tidak lengkap untuk baris: ' . json_encode($row));
            return null;
        }
    
        $SiswaRole = Role::where('name', 'siswa')->first();
        
        if (!$SiswaRole) {
            throw new \Exception('Role "siswa" tidak ditemukan.');
        }
    
        // Buat pengguna (User )
        $user = user::create([
            'name' => $row[0],
            'email' => $row[1], // Menggunakan NIS sebagai email
            'password' => Hash::make($row[2]),
        ]);
    
        // Assign role ke pengguna
        $user->assignRole($SiswaRole);
    
        // Buat siswa (Siswa)
        $siswa = siswa::create([
            'name' => $row[0], 
            'nis' => $row[1],
            'password' => Hash::make($row[2]), // Simpan password yang sudah di-hash
        ]);
        
        return $siswa;
    }

    public function rules(): array
    {
        return [
            '0' => 'required|string',
            '1' => 'required|numeric|unique:siswa,nis', // Pastikan NIS unik
            '2' => 'required|string|min:6', // Pastikan password minimal 6 karakter
        ];
    }

    public function onFailure(\Maatwebsite\Excel\Validators\Failure ...$failures)
    {
        // Log the validation errors
        foreach ($failures as $failure) {
            \Log::error('Import validation failed: ', $failure->errors());
        }
    }
}