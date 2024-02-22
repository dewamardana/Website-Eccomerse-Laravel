@extends('layouts.template')
@section('content')
<div class="container">
  <div class="row">
    <div class="login-form">
    <div class="col">
      <div class="card mb-3">
        <div class="card-header">
          <h3 class="card-title">Item</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>
                    No
                  </th>
                  <th>
                    Kode
                  </th>
                  <th>
                    Nama
                  </th>
                  <th>
                    Harga
                  </th>
                  <th>
                    Diskon
                  </th>
                  <th>
                    Qty
                  </th>
                  <th>
                    Subtotal
                  </th>
                </tr>
              </thead>
              <tbody>
              @foreach($itemorder->cart->detail as $detail)
                <tr>
                  <td>
                  <h5>{{ $no++ }}</h5>
                  </td>
                  <td>
                  <h5>{{ $detail->produk->kode_produk }}</h5>
                  </td>
                  <td>
                  <h5>{{ $detail->produk->nama_produk }}</h5>
                  </td>
                  <td class="text-right">
                  <h5>{{ number_format($detail->harga, 2) }}</h5>
                  </td>
                  <td class="text-right">
                  <h5>{{ number_format($detail->diskon, 2) }}</h5>
                  </td>
                  <td class="text-right">
                  <h5>{{ $detail->qty }}</h5>
                  </td>
                  <td class="text-right">
                  <h5>{{ number_format($detail->subtotal, 2) }}</h5>
                  </td>
                </tr>
              @endforeach
                <tr>
                  <td colspan="6">
                    <h4><b>Total</b></h4>
                  </td>
                  <td class="text-right">
                    <h4>
                    <b>{{ number_format($itemorder->cart->total, 2) }}</b>
                    </h4>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
          <a href="{{ route('transaksi.index') }}" class="tombol btn-danger col-2 m-auto mb-3">Tutup</a>
      </div>
      <div class="card mb-3">
        <div class="card-header"><h3>Alamat Pengiriman</h3></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-stripped">
              <thead>
                <tr>
                  <th><h4>Nama Penerima</h4></th>
                  <th><h4>Alamat</h4></th>
                  <th><h4>No tlp</h4></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <h5>{{ $itemorder->nama_penerima }}</h5>
                  </td>
                  <td><h5>
                    {{ $itemorder->alamat }}<br />
                    {{ $itemorder->kelurahan}}, {{ $itemorder->kecamatan}}<br />
                    {{ $itemorder->kota}}, {{ $itemorder->provinsi}} - {{ $itemorder->kodepos}}</h5>
                  </td>
                  <td>
                    <h5>{{ $itemorder->no_tlp }}</h5>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col col-lg-4 col-md-4 m-auto">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Ringkasan</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <td>
                    <h4>Total</h4>
                  </td>
                  <td class="text-right">
                    <h5>{{ number_format($itemorder->cart->total, 2) }}</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Subtotal</h4>
                  </td>
                  <td class="text-right">
                  <h5>{{ number_format($itemorder->cart->subtotal, 2) }}</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Diskon</h4>
                  </td>
                  <td class="text-right">
                  <h5>{{ number_format($itemorder->cart->diskon, 2) }}</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Ongkir</h4>
                  </td>
                  <td class="text-right">
                  <h5>{{ number_format($itemorder->cart->ongkir, 2) }}</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Ekspedisi</h4>
                  </td>
                  <td class="text-right">
                  <h5>{{ number_format($itemorder->cart->ekspedisi, 2) }}</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>No. Resi</h4>
                  </td>
                  <td class="text-right">
                  <h5>{{ number_format($itemorder->cart->no_resi, 2) }}</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Status Pembayaran</h4>
                  </td>
                  <td class="text-right">
                  <h5>{{ $itemorder->cart->status_pembayaran }}</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Status Pengiriman</h4>
                  </td>
                  <td class="text-right">
                  <h5>{{ $itemorder->cart->status_pengiriman }}</h5>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
@endsection