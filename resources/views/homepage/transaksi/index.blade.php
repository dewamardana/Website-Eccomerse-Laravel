@extends('layouts.template')
@section('content')
<div class="container">
  <div class="row">
    <div class="login-form">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            Data Transaksi
          </h3>
        </div>
        <div class="card-body">
          <!-- digunakan untuk menampilkan pesan error atau sukses -->
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
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th><h4>No</h4></th>
                  <th><h4>Invoice</h4></th>
                  <th><h4>Sub Total</h4></th>
                  <th><h4>Ongkir</h4></th>
                  <th><h4>Total</h4></th>
                  <th><h4>Status Pembayaran</th>
                  <th><h4>Status Pengiriman</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @foreach($itemorder as $order)
                <tr>
                  <td>
                    <h5>{{ ++$no }}</h5>
                  </td>
                  <td>
                    <h5>{{ $order->cart->no_invoice }}</h5>
                  </td>
                  <td>
                    <h5>{{ number_format($order->cart->subtotal, 2) }}</h5>
                  </td>
                  <td>
                    <h5>{{ number_format($order->cart->ongkir, 2) }}</h5>
                  </td>
                  <td>
                    <h5>{{ number_format($order->cart->total, 2) }}</h5>
                  </td>                  
                  <td>
                    <h5>{{ $order->cart->status_pembayaran }}</h5>
                  </td>
                  <td>
                    <h5>{{ $order->cart->status_pengiriman }}</h5>
                  </td>
                  <td>
                    <a href="{{ route('transaksi.show', $order->id) }}" class="tombol btn-sm btn-primary">Detail</a>
                    @if($itemuser->role == 'admin')
                    <a href="{{ route('transaksi.edit', $order->id) }}" class="tombol btn-sm btn-warning mb-2">
                      Edit
                    </a>
                    @endif
                    @if($order->cart->status_pembayaran == 'sudah')
                    <a href="{{ route('review.create',  $order->id)}}" class="tombol btn-sm btn-primary mb-2" onclick="d">
                      Tambahkan Komentar
                    </a>
                    @endif
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection