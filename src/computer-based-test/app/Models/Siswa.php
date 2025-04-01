<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'name',
        'nis',
        'password', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'nis', 'email'); // Pastikan kolom yang digunakan untuk relasi benar
    }

    public function gurus()
    {
        return $this->belongsToMany(Guru::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function latihanSoals()
    {
        return $this->belongsToMany(LatihanSoal::class);
    }

    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class);
    }

    public function ujians()
    {
        return $this->belongsToMany(Ujian::class);
    }

    public function jawabanSiswa()
    {
        return $this->hasMany(JawabanSiswa::class);
    }

    public function mataPelajarans()
    {
        return $this->belongsToMany(MataPelajaran::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function kurikulums()
    {
        return $this->belongsToMany(Kurikulum::class);
    }
}