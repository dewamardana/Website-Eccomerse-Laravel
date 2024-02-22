<?php

namespace App\Models;

use App\Models\Cart;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlamatPengiriman extends Model
{
    use HasFactory;
    protected $table = 'alamat_pengiriman';
    protected $fillable = [
        'user_id',
        'status',
        'nama_penerima',
        'no_tlp',
        'alamat',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'kodepos',
        'ongkir',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function cart() {
      return $this->hasOne(Cart::class);
    }
}
