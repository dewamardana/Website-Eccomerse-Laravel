@extends('layouts.main')


@section('main')
<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>Selamat datang di <br><span>Mardana Food Fresh</span></h3>
        <p>Produk yang <span>Segar</span> selalu tersedia untuk anda </p>
        <a href="#products" class="btn">Belanja Sekarang</a>
    </div>

</section>

<!-- home section ends -->

<!-- products section starts  -->

<section class="products" id="products">

    <h1 class="heading"> Poduk <span>Promo</span> </h1>
    <div class="swiper product-slider">

        <div class="swiper-wrapper">
          @foreach($itempromo as $promo)
            <div class="swiper-slide box">
              <!-- GAMBAR PRODUK -->
                <a href="{{ URL::to('produk/'.$promo->produk->slug_produk) }}">
                  @if($promo->produk->foto != null)
                    <img src="{{\Storage::url($promo->produk->foto) }}" alt="{{ $promo->produk->nama_produk }}" class="card-img-top">
                  @else
                    <img src="{{asset('images/bag.jpg') }}" alt="{{ $promo->produk->nama_produk }}" class="card-img-top">
                  @endif
                </a>
              <!-- AKHIR GAMBAR PRODUK -->
                <h3 class="card-text">{{ $promo->produk->nama_produk }}  {{ $promo->produk->qty}}  {{ $promo->produk->satuan }}</h3>
                  <!-- HARGA PRODUK -->
                <p>
                <div class="price">                   
                  Rp. {{ number_format($promo->harga_awal, 2) }}
                </div>                  
                  <h3>Rp. {{ number_format($promo->harga_akhir, 2) }}</h3>
                </p>
                <!-- AKHIR HARGA PRODUK -->
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>        
                <form action="{{ route('cartdetail.store') }}" method="POST">
                      @csrf
                        <input type="hidden" name="produk_id" value={{$promo->produk->id}}>
                        <button class="btn" type="submit">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                    <a href="{{ URL::to('produk/'.$promo->produk->slug_produk) }}" class="btn text-decoration-none">INFO</a>
                </form>
            </div>
            @endforeach
        </div>

    </div>

    <h1 class="heading" id="fresh"> Produk <span>Terbaru</span> </h1>

    <div class="swiper product-slider">

        <div class="swiper-wrapper">
          @foreach($itemproduk as $produk)
            <div class="swiper-slide box">
              <!-- GAMBAR PRODUK -->
                <a href="{{ URL::to('produk/satu') }}">
                  @if($produk->foto != null)
                    <img src="{{ \Storage::url($produk->foto) }}" alt="{{ $produk->nama_produk }}" class="card-img-top">
                  @else
                    <img src="{{ asset('images/bag.jpg') }}" alt="{{ $produk->nama_produk }}" class="card-img-top">
                  @endif
                </a>
              <!-- AKHIR GAMBAR PRODUK -->

                <!-- NAMA PRODUK -->
                <a href="{{ URL::to('produk/'.$produk->slug_produk ) }}" class="text-decoration-none">
                  <h3 class="card-text">
                    {{ $produk->nama_produk }}  {{ $promo->produk->qty}}  {{ $promo->produk->satuan }}</h3>
                </a>
                <!-- AKHIR NAMA PRODUK -->

                  <!-- HARGA PRODUK -->
                  
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
                
                <!-- AKHIR HARGA PRODUK -->
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>        
                <form action="{{ route('cartdetail.store') }}" method="POST">
                      @csrf
                        <input type="hidden" name="produk_id" value={{$produk->id}}>
                        <button class="btn" type="submit">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                    <a href="{{ URL::to('produk/'.$produk->slug_produk) }}" class="btn text-decoration-none">INFO</a>
                </form>
            </div>
            @endforeach

        </div>
    </div>

        <h1 class="heading" id="fresh"> Paket <span>Resep</span> </h1>

    <div class="swiper product-slider">

        <div class="swiper-wrapper">
          @foreach($itemresep as $resep)
            <div class="swiper-slide box">
              <!-- GAMBAR PRODUK -->
                <a href="{{ URL::to('produk/satu') }}">
                  @if($resep->foto != null)
                    <img src="{{ \Storage::url($resep->foto) }}" alt="{{ $resep->nama_produk }}" class="card-img-top">
                  @else
                    <img src="{{ asset('images/bag.jpg') }}" alt="{{ $resep->nama_produk }}" class="card-img-top">
                  @endif
                </a>
              <!-- AKHIR GAMBAR PRODUK -->

                <!-- NAMA PRODUK -->
                <a href="{{ URL::to('produk/'.$resep->slug_produk ) }}" class="text-decoration-none">
                  <h3 class="card-text">
                    {{ $resep->nama_produk }} <br>
                  </h3>
                </a>
                <h5>*Resep masakan akan dikirim</h5>
                <!-- AKHIR NAMA PRODUK -->

                  <!-- HARGA PRODUK -->
                  
                  @if($resep->promo != null)
                      <p>
                        <div class="price">
                          Rp. <del>{{ number_format($resep->promo->harga_awal, 2) }}</del>
                        </div>
                          <h3>Rp. {{ number_format($resep->promo->harga_akhir, 2) }}</h3>
                      </p>
                    @else
                      <h3><p>Rp. {{ number_format($resep->harga, 2) }}</p> </h3>
                    @endif
                
                <!-- AKHIR HARGA PRODUK -->
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>        
                <form action="{{ route('cartdetail.store') }}" method="POST">
                      @csrf
                        <input type="hidden" name="produk_id" value={{$resep->id}}>
                        <button class="btn" type="submit">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                    <a href="{{ URL::to('produk/'.$resep->slug_produk) }}" class="btn text-decoration-none">INFO</a>
                </form>
            </div>
            @endforeach

        </div>
    </div>


</section>

<!-- products section ends -->

<!-- categories section starts  -->

<section class="categories" id="categories">

    <h1 class="heading"> product <span>Kategori</span> </h1>

    <div class="box-container">
    @foreach($itemkategori as $kategori)
        <div class="box">
          <!-- GAMBAR KATEGORI -->
            <a href="{{ URL::to('kategori/'.$kategori->slug_kategori) }}">
              @if($kategori->foto != null)
                <img src="{{ \Storage::url($kategori->foto) }}" alt="{{ $kategori->nama_kategori }}" class="card-img-top">
              @else
                <img src="{{ asset('images/bag.jpg') }}" alt="{{ $kategori->nama_kategori }}" class="card-img-top">
              @endif
            </a>
          <!-- AKHIR GAMBAR KATEGORI -->
            
          <!-- NAMA KATEGORI -->
            <a href="{{ URL::to('kategori/'.$kategori->slug_kategori) }}" class="text-decoration-none">
              <h3 class="card-text">{{ $kategori->nama_kategori }}</h3>
            </a>
          <!-- AKHIR NAMA KATEGORI -->
          <a href="/Kategori/{{ $kategori->slug_kategori }}" class="btn">{{ $kategori->nama_kategori  }}</a>
            
        </div>
    @endforeach
    </div>

</section>

<!-- categories section ends -->

<!-- review section starts  -->
<section class="review" id="review">

    <h1 class="heading"> customer's <span>review</span> </h1>
     <a href="/review" class="btn">Lihat Semua</a>

    <div class="swiper review-slider">

        <div class="swiper-wrapper">
            @foreach($reviews as $review)
            <div class="swiper-slide box">
                <h3>{{ $review->user->name }}</h3>
                  <h4><a href="/review/{{ $review->id}}" style="color: #000000">{!! $review->excerpt !!}</a></h4>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
            @endforeach
        </div>

    </div>

</section>

<!-- review section ends -->
@endsection