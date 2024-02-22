<?php

namespace App\Models;

use App\Models\User;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlist';
    protected $fillable = [
        'produk_id',
        'user_id',
    ];

    public function produk () {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
    public function user () {
        return $this->belongsTo(User::class, 'user_id');
    }
}
