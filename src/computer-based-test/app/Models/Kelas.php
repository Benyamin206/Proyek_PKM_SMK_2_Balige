<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'nama_kelas',
        'user_id',
    ];

    // Relasi dengan model User (Operator)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}