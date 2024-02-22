<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Responsive Grocery Website Design Tutorial</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css') }}">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>

    <style>
      trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
      }
    </style>
</head>
<body>
    
<!-- header section starts  -->

<header class="header">

   <a href="#" class="logo"> <img src="/image/logo-website.gif" alt="" width="50" height="50"></a>


    <nav class="navbar">
        <a href="/#home">Home</a>
        <a href="/#products">Promo</a>
        <a href="/#fresh">Fresh</a>
        <a href="/#categories">Kategori</a>
        <a href="/#review">review</a>
    </nav>

    
    @auth
    <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        <div class="fas fa-search" id="search-btn"></div>
        <a href="{{ route('wishlist.index') }}"><div class="fas fa-heart" id="wishlist-btn"></div></a>
        <a href="{{ route('cart.index') }}"><div class="fas fa-shopping-cart" id="cart-btn"></div></a>
        <div class="fas fa-th-list" id="login-btn"></div>
    </div>

    <div class="login-form">
      <p>Selamat Datang, {{ auth()->user()->name }}</p>
      @can('admin')
      <p><a href="/admin" class="btn">Dashboard</a></p>
      @endcan
      <p><a href="{{ route('transaksi.index') }}" class="btn">
            Data Transaksi
          </a></p>
        <form action="/logout" method="post">
          @csrf
              <button type="submit" class="btn">Logout</button>
        </form>
    </div>
    @else
      <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        <div class="fas fa-search" id="search-btn"></div>
        <a href="{{ route('cart.index') }}"><div class="fas fa-shopping-cart" id="cart-btn"></div></a>
        <a href="/login"><div class="fas fa-user" id="login-btn"></div></a>
        
    </div>
    @endauth
    
    <form action="/cari" class="search-form">
        <input type="search" id="search-box" placeholder="search here..." name="cari"
        value="{{ request('cari') }}">
        <label for="search-box" class="fas fa-search"></label>
    </form>


</header>

<!-- header section ends -->
<div class="main">
  @yield('content')
</div>
<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3><img src="/image/logo-website.gif" alt="" width="50" height="50">    Mardana Food Fresh</h3>
            <p>Selalu Menyedian Produk Berkualitas Untuk Anda</p>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-line"></a>
                <a href="#" class="fab fa-instagram"></a>
            </div>
        </div>

        <div class="box">
            <h3>Kontak info</h3>
            <a href="#" class="links"> <i class="fab fa-whatsapp"></i> +6285858158622 </a>
            <a href="#" class="links"> <i class="fas fa-phone"></i> +6285858158622</a>
            <a href="#" class="links"> <i class="fas fa-envelope"></i> dewamardana33@gmail.com </a>
            <a href="#" class="links"> <i class="fas fa-map-marker-alt"></i>Baturiti, Tabanan - 82191</a>
        </div>

        <div class="box">
            <h3>Beralih</h3>
            <a href="/#home" class="links">       <i class="fas fa-phone"></i>>Home</a>
            <a href="/#products" class="links">   <i class="fas fa-phone"></i>>Promo</a>
            <a href="/#fresh" class="links">      <i class="fas fa-phone"></i>>Fresh</a>
            <a href="/#categories" class="links"> <i class="fas fa-phone"></i>>Kategori</a>
            <a href="/#review" class="links">     <i class="fas fa-phone"></i>>review</a>
        </div>

    </div>

    <div class="credit"> created by <span> Dewa Made Mardana </span> | all rights reserved </div>

</section>

<!-- footer section ends -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js') }}" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- custom js file link  -->
    <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>