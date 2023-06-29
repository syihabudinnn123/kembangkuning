@extends('admin.templates.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Perkebunan/Pertanian</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.perkebunan.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6 @error('author_id') has-error @enderror">
                        <label for="" >Pemilik</label>
                        <select name="warga_id" id="" class="form-control select2">
                            @foreach ($wargas as $warga)
                                <option value="{{ $warga->id }}" class="">{{ $warga->nama }}</option>
                            @endforeach
                        </select>
                        @error('warga_id')
                            <span  class="help-block"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for=""@error('name') class="text-danger" @enderror >Jenis Perkebunan</label>
                        <input type="text" name="jenis_perkebunan" class="form-control @error('name') form-control is-invalid @enderror"
                        placeholder="Masukkan Perkebunan Apa yang dimiliki?" value="{{ old('jenis_perkebunan') }}">
                        @error('name')
                            <span  class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for=""@error('deskripsi') class="text-danger" @enderror >Deskripsi</label>
                    <textarea name="deskripsi" id="" rows="3" class="form-control @error('deskripsi') form-control is-invalid @enderror" 
                    placeholder="Tuliskan Deskripsi Perkebunan"> {{old ('deskripsi') }} </textarea>
                    @error('deskripsi')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for=""@error('luas_lahan') class="text-danger" @enderror >Luas Lahan (m2)</label>
                    <input type="text" name="luas_lahan" class="form-control @error('luas_lahan') form-control is-invalid @enderror"
                    placeholder="Masukkan Luas Perkebunan/ Pertanian" value="{{ old('luas_lahan') }}">
                    @error('luas_lahan')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for=""@error('waktu_tanam') class="text-danger" @enderror >Waktu Tanam</label>
                        <input type="date" name="waktu_tanam" class="form-control @error('waktu_tanam') form-control is-invalid @enderror"
                        placeholder="Masukkan Jumlah Buku" value="{{ old('waktu_tanam') }}">
                        @error('waktu_tanam')
                            <span  class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for=""@error('waktu_panen') class="text-danger" @enderror >Waktu Panen</label>
                        <input type="date" name="waktu_panen" class="form-control @error('waktu_panen') form-control is-invalid @enderror"
                        placeholder="Masukkan Waktu Panen" value="{{ old('waktu_panen') }}">
                        @error('waktu_panen')
                            <span  class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
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