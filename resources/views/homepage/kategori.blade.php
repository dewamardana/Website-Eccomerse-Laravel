
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kategori : {{ $judul}}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/styleinfo.css') }}">
</head>
<body>
@extends('layouts.main')

@section('main')
<section class="products" id="products">
  <h1 class="heading"> Kategori <span>{{$judul}}</span> </h1>
  <div class="col-lg-8 m-auto">
        @if(session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        @if(session()->has('loginError'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        </div>
  <div class="row">
    @foreach($produks as $produk) 
    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
      <div class="product-slider">
        <div class="items">
            <div class="box">
                <a href="{{ URL::to('produk/'.$produk->slug_produk) }}">
                  @if($produk->foto != null)
                    <img src="{{ \Storage::url($produk->foto) }}" alt="{{ $produk->nama_produk }}" class="card-img-top">
                  @else
                    <img src="{{ asset('images/bag.jpg') }}" alt="{{ $produk->nama_produk }}" class="card-img-top">
                  @endif
                </a>
                <h3>
                  <a href="{{ URL::to('produk/'.$produk->slug_produk ) }}" class="text-decoration-none">
                    <p class="card-text">
                      {{ $produk->nama_produk }}  {{ $produk->qty}} {{ $produk->satuan }}
                    </p>
                </a>
                </h3>
                @if($produk->promo != null)
                      <p>
                        <div class="price">
                          Rp. <del>{{ number_format($produk->promo->harga_awal, 2) }}</del>
                        </div>
                          <h3>Rp. {{ number_format($produk->promo->harga_akhir, 2) }}</h3>
                      </p>
                    @else
                      <h3><p>Rp. {{ number_format($produk->harga, 2) }}</p> </h3>
                    @endif
                <form action="{{ route('wishlist.store') }}" method="post" class="d-inline-block">
                      @csrf
                        <input type="hidden" name="produk_id" value={{ $produk->id }}>
                        <button type="submit" class="button btn-success">
                      @if(isset($itemwishlist) && $itemwishlist)
                        <i class="fas fa-solid fa-heart"></i>
                      @else
                        <i class="fas fa-solid fa-heart"></i>
                      @endif
                    </button>
                </form>
                <form action="{{ route('cartdetail.store') }}" method="POST" class="d-inline-block">
                      @csrf
                        <input type="hidden" name="produk_id" value={{$produk->id}}>
                        <button class="button btn-primary" type="submit">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                    </form><br>
                <a href="{{ URL::to('produk/'.$produk->slug_produk ) }}" class="button btn-warning">INFO</a>
                <a href="/" class="button btn-danger">BACK</a>
                
            </div>
        </div>
      </div>
    </div>
    @endforeach
    </div>
</section>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
