<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'nip',
        'user_id',
        'password', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class); 
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function ujian()
    {
        return $this->hasMany(Ujian::class);
    }

    public function latihanSoals()
    {
        return $this->hasMany(LatihanSoal::class);
    }

    public function mataPelajarans()
    {
        return $this->hasMany(MataPelajaran::class);
    }
}