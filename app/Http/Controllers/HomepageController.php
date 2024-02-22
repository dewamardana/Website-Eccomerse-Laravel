<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Review;
use App\Models\Kategori;
use App\Models\Wishlist;
use App\Models\ProdukPromo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function index() {
        $itemproduk = Produk::orderBy('created_at', 'desc')->limit(6)->get();
        $itempromo = ProdukPromo::orderBy('created_at', 'desc')->limit(6)->get();
        $itemkategori = Kategori::orderBy('nama_kategori', 'asc')->get();
        $itemresep = Produk::where('tipe', 'resep')->get();
        $itemreview = Review::all();
        $data = array('title' => 'Homepage',
            'itemproduk' => $itemproduk,
            'itempromo' => $itempromo,
            'itemkategori' => $itemkategori,
            'reviews' => $itemreview,
            'itemresep' => $itemresep,
        );
        return view('homepage.index', $data);
    }

    public function kategori(Kategori $kategori)
    {
      return view('homepage.kategori', [
        'judul' => $kategori->nama_kategori,
        'produks' => $kategori->produk->load('kategori'),
      ]);
    }

    public function produkdetail($id) {
        $itemproduk = Produk::where('slug_produk', $id)
                            ->where('status', 'publish')
                            ->first();
        if ($itemproduk) {
            if (Auth::user()) {//cek kalo user login
                $itemuser = Auth::user();
                $itemwishlist = Wishlist::where('produk_id', $itemproduk->id)
                                        ->where('user_id', $itemuser->id)
                                        ->first();
                $data = array('title' => $itemproduk->nama_produk,
                        'itemproduk' => $itemproduk,
                        'itemwishlist' => $itemwishlist);
            } else {
                $data = array('title' => $itemproduk->nama_produk,
                            'itemproduk' => $itemproduk);
            }
            return view('homepage.produkdetail', $data);            
        } else {
            // kalo produk ga ada, jadinya tampil halaman tidak ditemukan (error 404)
            return abort('404');
        }
    }

    public function cari() 
    {    
      $itemproduk = Produk::latest()->filter(request(['cari']))->get();
        return view('homepage.cari', [ 
          "judul" => 'Hasil Pencarian',
          "hasil" =>  $itemproduk,
        ]);
    }
    
}
