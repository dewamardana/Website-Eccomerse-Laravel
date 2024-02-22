<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Komentar {{ $judul}}</title>
      <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('css/styleinfo.css') }}">

</head>
<body>

@extends('layouts.template')

@section('content')

<section class="products" id="products">  
    <h1 class="heading"> Komentar {{ $judul}}</h1>
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
                <h5>{!! $itemreview->komentar !!}</h5>
              </div>
              <a href="/review" class="button btn-danger">Back</a>
        </div>
    </div>
</section>
@endsection
</body>
</html>