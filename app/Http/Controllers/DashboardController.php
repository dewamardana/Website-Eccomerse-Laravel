<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Produk;


class DashboardController extends Controller
{
        public function index() {
          $itemtransaksi = Order::whereHas('cart', function($q){
          $q->where('status_pembayaran', 'sudah');
          })->get();

          $itemuser = User::where('role', 'member')->get();
          $itemterbaru = Produk::orderBy('created_at', 'desc')->limit(4)->get();
          $itemproduk = Produk::all();
          $this->authorize('admin');
        $data = array('title' => 'Dashboard',
                      'itemtransaksi' => $itemtransaksi,
                      'itemterbaru' => $itemterbaru,
                      'itemuser' => $itemuser,
                      'itemproduk' => $itemproduk,);
        return view('dashboard.index', $data);
    }
}
