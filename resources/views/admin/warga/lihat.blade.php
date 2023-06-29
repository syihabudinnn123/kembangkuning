
@extends('admin.templates.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Informasi Data Warga</h3>
        </div>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>NIK</label>
                      <input type="text" name="NIK" class="form-control @error('NIK') form-control is-invalid @enderror"
                        placeholder="Masukkan Nomor Induk Keluarga" value="{{ $warga->NIK ?? old('NIK') }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Nama Lengkap</label>
                      <input type="text" name="nama" class="form-control @error('nama') form-control is-invalid @enderror"
                        placeholder="Tuliskan Nama Lengkap" value="{{ $warga->nama ?? old('nama') }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') form-control is-invalid @enderror"
                         placeholder="Tempat Lahir Anda" value="{{ $warga->tempat_lahir ?? old('tempat_lahir') }}"readonly>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') form-control is-invalid @enderror"
                         placeholder="Tanggal Lahir Anda" value="{{ $warga->tanggal_lahir ?? old('tanggal_lahir') }}"readonly>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" id="" rows="3" class="form-control @error('alamat') form-control is-invalid @enderror"
                     placeholder="Alamat tempat tinggal" readonly> {{$warga->alamat ?? old ('alamat') }} </textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                      <label>No Handphone</label>
                      <input type="tel" name="telp" class="form-control @error('telp') form-control is-invalid @enderror"
                    placeholder="Masukkan Nomor Handphone" value="{{ $warga->telp ?? old('telp') }}"readonly>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="">Jenis Kelamin</label>
                      <input type="text" name="nama" class="form-control @error('nama') form-control is-invalid @enderror"
                        placeholder="Tuliskan Nama Lengkap" value="{{ $warga->jenis_kelamin ?? old('jenis_kelamin') }}"readonly>
                    </div>
                    <div class="form-group col-md-3">
                      <label>Agama</label>
                      <input type="text" name="agama" class="form-control @error('agama') form-control is-invalid @enderror"
                        placeholder="agama" value="{{ $warga->agama?? old('agama') }}" readonly>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputPassword4">Pekerjaan</label>
                      <input type="text" name="pekerjaan" class="form-control @error('pekerjaan') form-control is-invalid @enderror"
                    placeholder="Masukkan Pekerjaan Anda" value="{{ $warga->pekerjaan?? old('pekerjaan') }}" readonly>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


