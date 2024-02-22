<?php

namespace App\Models;

use App\Models\User;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $fillable = [
        'kode_kategori',
        'nama_kategori',
        'slug_kategori',
        'deskripsi_kategori',
        'status',
        'foto',
        'user_id',
    ];

    public function user() {//user yang menginput data kategori
        return $this->belongsTo(User::class, 'user_id');
    }

    public function produk()
    {
      return $this->hasMany(Produk::class);
    }

}
