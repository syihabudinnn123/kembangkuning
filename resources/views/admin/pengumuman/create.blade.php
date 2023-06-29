@extends('admin.templates.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Pengumuman</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.pengumuman.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for=""@error('name') class="text-danger" @enderror >Judul Pengumuman</label>
                    <input type="text" name="nama" class="form-control @error('nama') form-control is-invalid @enderror"
                    placeholder="Masukkan Judul Pengumuman" value="{{ old('nama') }}">
                    @error('nama')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""@error('deskripsi') class="text-danger" @enderror >Deskripsi</label>
                    <textarea name="deskripsi" id="" rows="3" class="form-control @error('deskripsi') form-control is-invalid @enderror"
                    placeholder="Tuliskan Deskripsi Tentang Pengumuman"> {{old ('deskripsi') }} </textarea>
                    @error('deskripsi')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group @error('gambar') has-error @enderror">
                    <label for="" >Gambar Pengumuman/ Surat Edaran</label>
                    <input type="file" name="gambar" class="form-control">
                    @error('gambar')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""@error('tanggal') class="text-danger" @enderror >Tanggal Pengumuman</label>
                    <input type="date" name="tanggal" class="form-control @error('tanggal') form-control is-invalid @enderror"
                    placeholder="Masukkan Jumlah Buku" value="{{ old('tanggal') }}">
                    @error('tanggal')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" value="Tambah" class="btn btn-primary">
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
