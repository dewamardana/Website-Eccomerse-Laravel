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
                    <h4>No</h4>
                  </th>
                  <th>
                    <h4>Kode</h4>
                  </th>
                  <th>
                    <h4>Nama</h4>
                  </th>
                  <th>
                    <h4>Harga</h4>
                  </th>
                  <th>
                    <h4>Diskon</h4>
                  </th>
                  <th>
                    <h4>Qty</h4>
                  </th>
                  <th>
                    <h4>Subtotal</h4>
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
                    <b>
                    <h5>{{ number_format($itemorder->cart->total, 2) }}</h5>
                    </b>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
          <a href="{{ route('transaksi.index') }}" class="tombol col-2 m-auto mb-3 btn-danger">Tutup</a>
      </div>
      <div class="card">
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
                  <td>
                    <h5>{{ $itemorder->alamat }}<br/>
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
    <div class="col col-lg-4 col-md-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Ringkasan</h3>
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
          <div class="table-responsive">
            <table class="table">
              <form action="{{ route('transaksi.update', $itemorder->id) }}" method='post'>
              @csrf
              {{ method_field('patch') }}
              <tbody>
                <tr>
                  <td>
                    <h4>Total</h4>
                  </td>
                  <td>
                    <input type="text" name="total" id="total" class="form-control" value="{{ $itemorder->cart->total }}">
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Subtotal</h4>
                  </td>
                  <td>
                  <input type="text" name="subtotal" id="subtotal" class="form-control" value="{{ $itemorder->cart->subtotal }}">
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Diskon</h4>
                  </td>
                  <td>
                    <input type="text" name="diskon" id="diskon" class="form-control" value="{{ $itemorder->cart->diskon }}">
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Ongkir</h4>
                  </td>
                  <td>
                    <input type="text" name="ongkir" id="ongkir" class="form-control" value="{{ $itemorder->cart->ongkir }}">
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Ekspedisi</h4>
                  </td>
                  <td>
                    <input type="text" name="ekspedisi" id="ekspedisi" class="form-control" value="{{ $itemorder->cart->ekspedisi }}">
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>No. Resi</h4>
                  </td>
                  <td>
                    <input type="text" name="no_resi" id="no_resi" class="form-control" value="{{ $itemorder->cart->no_resi }}">
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Status Pembayaran</h4>
                  </td>
                  <td>
                    <select name="status_pembayaran" id="status_pembayaran" class="form-control">
                      <option value="sudah" {{ $itemorder->cart->status_pembayaran == 'sudah' ? 'selected':'' }}>Sudah Dibayar</option>
                      <option value="belum" {{ $itemorder->cart->status_pembayaran == 'belum' ? 'selected':'' }}>Belum Dibayar</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Status Pengiriman</h4>
                  </td>
                  <td>
                    <select name="status_pengiriman" id="status_pengiriman" class="form-control">
                      <option value="sudah" {{ $itemorder->cart->status_pengiriman == 'sudah' ? 'selected':'' }}>Sudah</option>
                      <option value="belum" {{ $itemorder->cart->status_pengiriman == 'belum' ? 'selected':'' }}>Belum</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                  </td>
                  <td>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </td>
                </tr>
              </tbody>
              </form>
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