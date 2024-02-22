@extends('layouts.template')
@section('content')
<div class="container mt-5">
  <div class="row">
     <div class="col col-lg-8 col-md-8 m-auto">
      <div class="card mt-5 mb-4">
        <div class="card-body">
          <h1 class="card-title mt-5">Tambahkan Komentar</h1>
            <a href="/review/" class="tombol btn-sm btn-danger mb-5">
              Tutup
            </a>
          <!-- @if(count($errors) > 0)
          @foreach($errors->all() as $error)
              <div class="alert alert-warning">{{ $error }}</div>
          @endforeach
          @endif
          @if ($message = Session::get('error'))
              <div class="alert alert-warning">
                  <p>{{ $message }}</p>
              </div>
          @endif
          @if ($message = Session::get('success'))
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
          @endif -->
          <form action="/review" method="post">
            @csrf
            <div class="mb-3">
              <label for="komentar" class="form-label"><h4>Komentar</h4></label>
              <input id="komentar" type="hidden" name="komentar">
              <trix-editor input="komentar"></trix-editor>
            </div>
            <div class="form-group">
              <button type="submit" class="tombol btn-primary">Simpan</button>
              <button type="reset" class="tombol btn-warning">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  })
</script>
@endsection