<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use App\Models\CartDetail;
use App\Models\AlamatPengiriman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $fillable = [
        'user_id',
        'no_invoice',
        'status_cart',
        'status_pembayaran',
        'status_pengiriman',
        'no_resi',
        'ekspedisi',
        'subtotal',
        'ongkir',
        'diskon', 
        'total',
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function detail() {
        return $this->hasMany(CartDetail::class, 'cart_id');
    }
    
    public function updatetotal($itemcart, $subtotal) {
        $this->attributes['subtotal'] = $itemcart->subtotal + $subtotal;
        $this->attributes['total'] = $itemcart->total + $subtotal;
        self::save();
    }
}
