<?php

namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdukImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'produk_id',
        'foto',
    ];

    public function produk() {
        return $this->belongsTo(Produk::class,'produk_id');
    }
}
