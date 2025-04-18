<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kurikulum extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'nama_kurikulum',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); 
    }

    public function mataPelajaran()
    {
        return $this->hasMany(MataPelajaran::class, 'kurikulum_id', 'id');
    }
}