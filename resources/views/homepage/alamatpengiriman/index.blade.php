@extends('layouts.template')
@section('content')
<div class="container">
  <div class="row">
    <div class="login-form">
    <div class="col col-12 mb-2">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <h3>Alamat Pengiriman</h3>
            </div>
            <div class="col-auto">
              <a href="{{ URL::to('checkout') }}" class="tombol btn-danger">
                Tutup
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-stripped">
              <thead>
                <tr>
                  <th>Nama Penerima</th>
                  <th>Kecamatan</th>
                  <th>No tlp</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @foreach($itemalamatpengiriman as $pengiriman)
                <tr>
                  <td>
                    {{ $pengiriman->nama_penerima }}
                  </td>
                  <td>
                    {{ $pengiriman->kelurahan}}, {{ $pengiriman->kecamatan}}<br />
                    {{ $pengiriman->kota}}, {{ $pengiriman->provinsi}} - {{ $pengiriman->kodepos}}
                  </td>
                  <td>
                    {{ $pengiriman->no_tlp }}
                  </td>
                  <td>
                    <form action="{{ route('alamatpengiriman.update',$pengiriman->id) }}" method="post">
                      @method('patch')
                      @csrf()
                      @if($pengiriman->status == 'utama')
                      <button type="submit" class="tombol btn-primary" disabled>Set Utama</button>
                      @else
                      <button type="submit" class="tombol btn-primary">Set Utama</button>
                      @endif
                    </form>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col col-8">
      <div class="card">
        <div class="card-header">
          <h3>Form Alamat Pengiriman</h3>
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
          <form action="{{ route('alamatpengiriman.store') }}" method="post">
            @csrf()
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="nama_penerima">Nama Penerima</label>
                  <input type="text" name="nama_penerima" class="form-control" value={{old('nama_penerima') }}>
                </div>
                <div class="form-group">
                  <label for="no_tlp">No Tlp</label>
                  <input type="text" name="no_tlp" class="form-control" value={{old('no_tlp') }}>
                </div>
                <div class="form-group">
                  <label for="provinsi">Provinsi</label>
                  <input type="text" name="provinsi" class="form-control" value={{old('provinsi') }}>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="kota">Kota</label>
                  <input type="text" name="kota" class="form-control" value={{old('kota') }}>
                </div>
                <div class="form-group">
                  <label for="kecamatan">Kecamatan</label>
                  <input type="text" name="kecamatan" id="kecamatan" class="form-control" value={{old('kecamatan') }}>
                </div>
                <div class="form-group">
                  <label for="kelurahan">Kelurahan</label>
                  <input type="text" name="kelurahan" class="form-control" value={{old('kelurahan') }}>
                </div>
                <div class="form-group">
                  <label for="kodepos">Kodepos</label>
                  <input type="text" name="kodepos" class="form-control" value={{old('kodepos') }}>
                </div>
                <div class="form-group">
                  <input type="hidden" name="ongkir" id="ongkir"  onclick="ganti()" class="form-control mb-3" value={{old('ongkir') }}>
                </div>
                <div class="form-group">
                  <button type="submit" class="tombol btn-success mt-3">Simpan</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<script>
  const i = document.getElementById("kecamatan");
    i.addEventListener('change', function ganti() {
    if(i.value.toUpperCase() == "BATURITI"){
        document.getElementById("ongkir").value = 10000;
    }else if(i.value.toUpperCase() == "MARGA"){
        document.getElementById("ongkir").value = 10000;
    }else if(i.value.toUpperCase() == "KEDIRI"){
        document.getElementById("ongkir").value = 15000;
    }else if(i.value.toUpperCase() == "KERAMBITAN"){
        document.getElementById("ongkir").value = 20000;
    }else if(i.value.toUpperCase() == "PENEBEL"){
        document.getElementById("ongkir").value = 15000;
    }else if(i.value.toUpperCase() == "PUPUAN"){
        document.getElementById("ongkir").value = 40000;
    }else if(i.value.toUpperCase() == "SELEMADEG"){
        document.getElementById("ongkir").value = 20000;
    }else if(i.value.toUpperCase() == "SELEMADEG BARAT"){
        document.getElementById("ongkir").value = 20000;
    }else if(i.value.toUpperCase() == "SELEMADEG TIMUR"){
        document.getElementById("ongkir").value = 20000;
    }else if(i.value.toUpperCase() == "TABANAN"){
        document.getElementById("ongkir").value = 15000;
    }else{
        document.getElementById("ongkir").value = 0;
      }
  });
</script>
@endsection