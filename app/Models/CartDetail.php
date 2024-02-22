<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartDetail extends Model
{
    use HasFactory;
    protected $table = 'cart_detail';
    protected $fillable = [
        'produk_id',
        'cart_id',
        'qty',
        'harga',
        'diskon',
        'subtotal',
    ];

    public function cart() {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function produk() {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    // function untuk update qty, dan subtotal
    public function updatedetail($itemdetail, $qty, $harga, $diskon) {
        $this->attributes['qty'] = $itemdetail->qty + $qty;
        $this->attributes['subtotal'] = $itemdetail->subtotal + ($qty * ($harga - $diskon));
        self::save();
    }
}
