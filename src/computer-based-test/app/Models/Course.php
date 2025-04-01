<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'nama_course',
        'password',
        'user_id',
    ];

    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'course_id', 'id');
    }

    public function ujians()
    {
        return $this->hasMany(Ujian::class, 'course_id', 'id');
    }

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class, 'siswa_courses', 'course_id', 'siswa_id'); // Asumsi ada tabel pivot siswa_courses
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}