@extends('admin.templates.default')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Data Warga</h3>
    </div>
    <div class="card-body">
    <form action="{{route('admin.warga.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for=""@error('NIK') class="text-danger" @enderror >NIK</label>
                <input type="text" name="NIK" class="form-control @error('NIK') form-control is-invalid @enderror"
                placeholder="Masukkan Nomor Induk Keluarga" value="{{ old('NIK') }}">
                @error('NIK')
                    <span  class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-group">
                <label for=""@error('nama') class="text-danger" @enderror >Nama Lengkap</label>
                <input type="text" name="nama" class="form-control @error('nama') form-control is-invalid @enderror"
                placeholder="Tuliskan Nama Lengkap"> {{old ('nama') }} </textarea>
                @error('nama')
                    <span  class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-group">
                <label for=""@error('tempat_lahir') class="text-danger" @enderror >Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') form-control is-invalid @enderror"
                placeholder="Tuliskan Kota Lahir Anda" value="{{ old('tempat_lahir') }}">
                @error('tempat_lahir')
                    <span  class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-group">
                <label for=""@error('tanggal_lahir') class="text-danger" @enderror >Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') form-control is-invalid @enderror"
                placeholder="Tanggal Lahir Anda" value="{{ old('tanggal_lahir') }}">
                @error('tanggal_lahir')
                    <span  class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-group">
                <label for=""@error('alamat') class="text-danger" @enderror >Alamat Rumah</label>
                <textarea name="alamat" id="" rows="3" class="form-control @error('alamat') form-control is-invalid @enderror"
                placeholder="AAA"> {{old ('alamat') }} </textarea>
                @error('alamat')
                    <span  class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-group">
                <label for=""@error('telp') class="text-danger" @enderror >Nomor Handphone</label>
                <input type="tel" name="telp" class="form-control @error('telp') form-control is-invalid @enderror"
                placeholder="Masukkan Nomor Handphone" value="{{ old('telp') }}">
                @error('tel')
                    <span  class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control" id="type" name="jenis_kelamin">
                    <option value="">Pilih</option>
                    <option value="Laki-laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Agama</label>
                <select class="form-control" id="type" name="agama">
                    <option value="">Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen Protestan">Kristen Protestan</option>
                    <option value="kristen Katolik">Kristen Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Konghucu">Other</option>
                </select>
                @error('agama')
                <span  class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-group">
                <label for=""@error('pekerjaan') class="text-danger" @enderror >Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control @error('pekerjaan') form-control is-invalid @enderror"
                placeholder="Masukkan Pekerjaan Anda" value="{{ old('pekerjaan') }}">
                @error('pekerjaan')
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
