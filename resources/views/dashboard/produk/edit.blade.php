@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-6 col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Form Produk</h3>
          <div class="card-tools">
            <a href="{{ route('produk.index') }}" class="btn btn-sm btn-danger">
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
          <form action="{{ route('produk.update', $itemproduk->id) }}" method="post">
            {{ method_field('patch') }}
            @csrf
            <div class="form-group">
              <label for="kategori_id">Kategori Produk</label>
              <select name="kategori_id" id="kategori_id" class="form-control">
                <option value="">Pilih Kategori</option>
                @foreach($itemkategori as $kategori)
                <option value="{{ $kategori->id }}" {{ $itemproduk->kategori_id == $kategori->id ? 'selected' : ''}}>{{ $kategori->nama_kategori }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="kode_produk">Kode Produk</label>
              <input type="text" name="kode_produk" id="kode_produk" value={{ $itemproduk->kode_produk }} class="form-control">
            </div>
            <div class="form-group">
              <label for="nama_produk">Nama Produk</label>
              <input type="text" name="nama_produk" id="nama_produk" value={{ $itemproduk->nama_produk }} class="form-control">
            </div>
            <div class="form-group">
              <label for="tipe">Tipe Produk</label>
            <div class="form-check mt-1">
              <input class="form-check-input" type="radio" name="tipe" id="tipep" value="produk">
              <label class="form-check-label" for="tipep">
                Produk
            </label>
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="tipe" id="tiper" value="resep">
              <label class="form-check-label fw-normal" for="tiper">
                Resep
            </label>
            </div>
            </div>
            <div class="form-group">
              <label for="slug_produk">Slug Produk</label>
              <input type="text" name="slug_produk" id="slug_produk" value={{ $itemproduk->slug_produk }} class="form-control">
            </div>
            <div class="form-group">
              <label for="deskripsi_produk">Deskripsi</label>
              <input id="deskripsi_produk" type="hidden" name="deskripsi_produk" value="{{ $itemproduk->deskripsi_produk }}">
              <trix-editor input="deskripsi_produk"></trix-editor>
            
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="qty">Qty</label>
                  <input type="text" name="qty" id="qty" value={{ $itemproduk->qty }} class="form-control">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="satuan">Satuan</label>
                  <input type="text" name="satuan" id="satuan" value={{ $itemproduk->satuan }} class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="harga">Harga</label>
              <input type="text" name="harga" id="harga" value={{ $itemproduk->harga }} class="form-control">
            </div>
            <div class="form-group">
              <label for="status">Status</label>
              <select name="status" id="status" class="form-control">
                <option value="publish" {{ $itemproduk->status == 'publish'? 'selected': ''}}>Publish</option>
                <option value="unpublish" {{ $itemproduk->status == 'unpublish'? 'selected': ''}}>Unpublish</option>
              </select>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Update</button>
              <button type="reset" class="btn btn-warning">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection