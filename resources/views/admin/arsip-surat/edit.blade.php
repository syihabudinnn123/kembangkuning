@extends('admin.templates.default')

@section('content')
@if ($message = Session::get('success'))
    <div class="card-body">
    <div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>
        {{ $message }}
      </div>
    </div>
    @elseif ($message = Session::get('errors'))
    <div class="alert alert-secondary alert-dismissible show fade">
        <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        {{ $message }}
        </div>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Arsip Surat</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.arsip-surat.update', $arsipSurat)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for=""@error('nomor_surat') class="text-danger" @enderror >Nomor Surat</label>
                    <input type="text" name="nomor_surat" class="form-control @error('nomor_surat') form-control is-invalid @enderror"
                    placeholder="Masukkan Nomor Surat"  value="{{ $arsipSurat->nomor_surat ?? old('nomor_surat') }}">
                    @error('nama_kategori')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""@error('judul_surat') class="text-danger" @enderror >Judul Surat</label>
                    <input type="text" name="judul_surat" class="form-control @error('judul_surat') form-control is-invalid @enderror"
                    placeholder="Masukkan Judul" value="{{ $arsipSurat->judul_surat ?? old('judul_surat') }}">
                    @error('nama_kategori')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""@error('tanggal_surat') class="text-danger" @enderror >Tanggal Surat</label>
                    <input type="date" name="tanggal_surat" class="form-control @error('tanggal_surat') form-control is-invalid @enderror"
                    placeholder="Masukkan Nama Kategori" value="{{ $arsipSurat->tanggal_surat ?? old('judul_surat') }}">
                    @error('nama_kategori')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" >Jenis Surat</label>
                    <div class="form-row ml-1">
                        @if($arsipSurat->jenis_surat == 'Surat Masuk')
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_surat" id="inlineRadio1" value="Surat Masuk" checked> 
                            <label class="form-check-label" for="inlineRadio1">Surat Masuk</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_surat" id="inlineRadio2" value="Surat Keluar">
                            <label class="form-check-label" for="inlineRadio2">Surat Keluar</label>
                          </div>
                        @else
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_surat" id="inlineRadio1" value="Surat Masuk" checked>
                            <label class="form-check-label" for="inlineRadio1">Surat Masuk</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_surat" id="inlineRadio2" value="Surat Keluar">
                            <label class="form-check-label" for="inlineRadio2">Surat Keluar</label>
                          </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                        <label for="" >Kategori Surat</label>
                        <select name="kategori_id" id="" class="form-control select2">
                            @foreach ($kategori as $k)
                            
                            <option {{ $k->id == $arsipSurat->kategori_id ? 'selected' : '' }} value="{{ $k->id }}" class="">{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('warga_id')
                            <span  class="help-block"> {{ $message }} </span>
                        @enderror
                    
                </div>
                <div class="form-group">
                    <label for=""@error('tanggal_surat') class="text-danger" @enderror >Unit Asal / Tujuan</label>
                    <input type="text" name="asal_tujuan" class="form-control @error('tanggal_surat') form-control is-invalid @enderror"
                    placeholder="Masukkan Unit Asal / Tujuan Surat" value="{{ $arsipSurat->asal_tujuan ?? old('asal_tujuan') }}">
                    @error('nama_kategori')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group @error('cover') has-error @enderror">
                    <label for="" >File Surat</label>
                    <input type="file" name="file_surat" class="form-control">
                    @error('cover')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection

@push('select2css')
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush
@push('scripts')
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>

    <script>
        $('.select2').select2();
    </script>
@endpush
