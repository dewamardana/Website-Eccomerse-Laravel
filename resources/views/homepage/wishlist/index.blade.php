@extends('layouts.template')
@section('content')
<div class="container">
  <div class="login-form">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Wishlist</h3>
        </div>
        <div class="card-body">
          @if ($message = Session::get('error'))
              <div class="alert alert-warning">
                {{ $message }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>         
              </div>
          @endif
          @if ($message = Session::get('success'))
              <div class="alert alert-success">
                {{ $message }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          @endif
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Gambar</th>
                  <th>Nama Produk</th>
                  <th>Harga</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($itemwishlist as $wish)
                <tr>
                  <td>
                    {{ ++$no }}
                  </td>
                  <td>
                    {{ $wish->produk->kode_produk }}
                  </td>
                  <td>
                    @if($wish->produk->foto != null)
                    <img src="{{ \Storage::url($wish->produk->foto) }}" alt="{{ $wish->produk->nama_produk }}" width='80px'  class="p-0">
                    @endif
                  </td>
                  <td>
                    {{ $wish->produk->nama_produk }}
                  </td>
                  <td>
                    {{ $wish->produk->harga}}
                  </td>
                  <td>
                    <form action="{{ route('wishlist.destroy', $wish->id) }}" method="post" style="display:inline;">
                      @csrf
                      {{ method_field('delete') }}
                      <button type="submit" class="tombol del">
                        Hapus
                      </button>                    
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $itemwishlist->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection