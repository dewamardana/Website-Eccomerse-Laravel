<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Info {{ $title}}</title>
      <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('css/styleinfo.css') }}">

</head>
<body>

@extends('layouts.template')

@section('content')

<section class="products" id="products">
      
    <h1 class="heading"> info <span>{{ $title }}</span> </h1>

    <div class="product-slider">
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
        <div class="items">
            <div class="box">
                @foreach($itemproduk->images as $index => $image)
                  @if($index == 0)
                      <img src="{{ \Storage::url($image->foto) }}" alt="{{ $itemproduk->nama_kategori }}">
                  @else
                      <img src="{{ \Storage::url($image->foto) }}" alt="{{ $itemproduk->nama_kategori }}">
                  @endif
                @endforeach
                <h3>{{ $itemproduk->nama_produk }}  {{ $itemproduk->qty}} {{ $itemproduk->satuan }}</h3>
                <h4>{!! $itemproduk->deskripsi_produk !!}</h4>
                <h3>Kategori : <a href="/Kategori/{{ $itemproduk->kategori->slug_kategori }}">{{ $itemproduk->kategori->nama_kategori  }}</a></h3>
                    @if($itemproduk->promo != null)
                      <p>
                        <div class="price">
                        Rp. <del>{{ number_format($itemproduk->promo->harga_awal, 2) }}</del>
                        </div>
                        <h3>Rp. {{ number_format($itemproduk->promo->harga_akhir, 2) }}</h3>
                      </p>
                    @else
                      <p>
                        <h3>Rp. {{ number_format($itemproduk->harga, 2) }}</h3>
                      </p>
                    @endif
                    <form action="{{ route('wishlist.store') }}" method="post" class="d-inline-block">
                      @csrf
                        <input type="hidden" name="produk_id" value={{ $itemproduk->id }}>
                        <button type="submit" class="button btn-warning">
                      @if(isset($itemwishlist) && $itemwishlist)
                        <i class="fas fa-solid fa-heart"></i>
                      @else
                        <i class="fas fa-solid fa-heart"></i>
                      @endif
                    </button>                    
                    </form>
                    <form action="{{ route('cartdetail.store') }}" method="POST" class="d-inline-block">
                      @csrf
                        <input type="hidden" name="produk_id" value={{$itemproduk->id}}>
                        <button class="button btn-success" type="submit">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                    </form>
            </div>
        </div>
    </div>
</section>
@endsection
</body>
</html>