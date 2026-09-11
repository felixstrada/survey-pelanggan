<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $table = 'surveys';

    protected $fillable = [
        'nama_lengkap',
        'no_whatsapp',
        'email',
        'sosialmedia',
        'rating',
        'masukan_saran',
    ];
}
