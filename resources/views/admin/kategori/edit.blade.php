@extends('admin.templates.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Data Perkebunan</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.kategori-surat.update', $kategoriSurat)}}" method="POST" enctype="multipart/form-data">
                @csrf
               
                @method("PUT")
                <div class="form-group">
                    <label for=""@error('nama_kategori') class="text-danger" @enderror >Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control @error('nama_kategori') form-control is-invalid @enderror"
                    placeholder="Masukkan Nama Kategori" value="{{ $kategoriSurat->nama_kategori ?? old('nama_kategori') }}">
                    @error('nama_kategori')
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
