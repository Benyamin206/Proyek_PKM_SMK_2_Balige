<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Operator extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'nama_sekolah',
        'email',
        'password',
        'status_aktif',
        'durasi',
        'user_id',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); 
    }

    public static $rules = [
        'status_aktif' => 'in:aktif,tidak aktif',
    ];


}