<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Komentar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/styleinfo.css') }}">
</head>
<body>
@extends('layouts.main')

@section('main')
<section class="products" id="products">
  <h1 class="heading">Komentar</h1>
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
    @foreach($itemreview as $review)
    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
      <div class="product-slider">
        <div class="items">
            <div class="box">
              <h3>
                <p class="card-text">
                  {{  $review->user->name  }}
                </p>
              </h3>
              <h5>
                <p class="card-text">
                  <a href="/review/{{ $review->id}}">{!! $review->excerpt !!}</a>
                </p>
              </h5>
            </div>
        </div>
      </div>
    </div>
    @endforeach
    </div>
    <a href="/" class="btn back">BACK</a>
</section>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>