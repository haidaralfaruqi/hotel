<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelians extends Model
{
    use HasFactory;
    protected $table = 'pembelians';
    protected $fillable = [
        'checkin_date', // Tambahkan checkin_date ke dalam fillable
        // Sisipkan atribut lain yang perlu diisi secara massal di sini
    ];
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

}
