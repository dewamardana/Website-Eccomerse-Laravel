<?php

namespace App\Models;

use App\Models\User;
use App\Models\Kategori;
use App\Models\ProdukImage;
use App\Models\ProdukPromo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $fillable = [
        'kategori_id',
        'user_id',
        'kode_produk',
        'nama_produk',
        'slug_produk',
        'deskripsi_produk',
        'foto',
        'qty',
        'satuan',
        'harga',
        'status',
        'tipe',
    ];

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function images() {
        return $this->hasMany(ProdukImage::class, 'produk_id');
    }

    public function promo() {
        return $this->hasOne(ProdukPromo::class, 'produk_id');
    }

    public function scopeFilter($query, array $filters)
    {
      $query->when($filters['cari'] ?? false, function($query, $cari){
        return $query->where('nama_produk', 'like', '%'. $cari.'%')
              ->orWhere('deskripsi_produk', 'like', '%'. $cari.'%');
        });
    }
}
