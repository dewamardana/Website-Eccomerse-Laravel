@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-6 col-lg-3">
      <div class="small-box bg-primary">
        <div class="inner">
          <!-- cetak totalnya -->
              <?php
              $total = 0;
              foreach ($itemtransaksi as $k) {
                $total += $k->cart->total;
              }
              ?>
              <!-- end cetak totalnya -->
          <h3>Total Penjualan</h3>
          <p>Rp. {{ number_format($total, 2) }}</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
      </div>
    </div>
    <div class="col-6 col-lg-3">
      <div class="small-box bg-info">
        <div class="inner">
          <h3>Jumlah Produk</h3>
          <p>{{ count($itemproduk) }}</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
      </div>
    </div>
    <div class="col-6 col-lg-3">
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>Pelanggan</h3>

          <p>{{ count($itemuser) }}</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        </div>
    </div>

    <div class="col-6 col-lg-3">
      <div class="small-box bg-success">
        <div class="inner">
          <h3>Total Transaksi</h3>

          <p>{{ count($itemtransaksi) }}</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
      </div>
    </div>
  </div>
  <!-- table produk baru -->
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Produk Baru</h4>
          <div class="card-tools">
          </div>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                  <th width="50px">No</th>
                  <th>Gambar</th>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach($itemterbaru as $produk)
                <tr>
                  <td>
                  {{$loop->iteration}}
                  </td>
                  <td>
                    @if($produk->foto != null)
                    <img src="{{ \Storage::url($produk->foto) }}" alt="{{ $produk->nama_produk }}" width='150px' class="img-thumbnail">
                    @endif
                  </td>
                  <td>
                  {{ $produk->kode_produk }}
                  </td>
                  <td>
                  {{ $produk->nama_produk }}
                  </td>
                  <td>
                  {{ $produk->qty }} {{ $produk->satuan }}
                  </td>
                  <td>
                  {{ number_format($produk->harga, 2) }}
                  </td>
                  <td>
                  {{ $produk->status }}
                  </td>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection