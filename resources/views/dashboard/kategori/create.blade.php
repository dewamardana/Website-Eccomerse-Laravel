@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-6 col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Form Kategori</h3>
          <div class="card-tools">
            <a href="{{ route('kategori.index') }}" class="btn btn-sm btn-danger">
              Tutup
            </a>
          </div>
        </div>
        <div class="card-body">
          @if(count($errors) > 0)
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
          @endif
          <form action="{{ route('kategori.store') }}" method='POST'>
          @csrf
            <div class="form-group">
              <label for="kode_kategori">Kode Kategori</label>
              <input type="text" name="kode_kategori" id="kode_kategori" class="form-control">
            </div>
            <div class="form-group">
              <label for="nama_kategori">Nama Kategori</label>
              <input type="text" name="nama_kategori" id="nama_kategori" class="form-control">
            </div>
            <div class="form-group">
              <label for="slug_kategori">Slug Kategori</label>
              <input type="text" name="slug_kategori" id="slug_kategori" class="form-control">
            </div>
            <div class="form-group">
              <label for="deskripsi_kategori">Deskripsi</label>
              <input id="deskripsi_kategori" type="hidden" name="deskripsi_kategori">
              <trix-editor input="deskripsi_kategori"></trix-editor>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn btn-warning">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection