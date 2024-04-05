<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model // Perhatikan perubahan di sini
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        // tambahkan field lain jika diperlukan
    ];
}
