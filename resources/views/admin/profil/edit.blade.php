@extends('admin.templates.default')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Data Profil Desa</h3>
    </div>
    <div class="card-body">
        <form  action="{{ route('admin.profil.update', $profil)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for=""@error('nama') class="text-danger" @enderror >Nama Desa</label>
                <input type="text" name="nama" class="form-control @error('nama') form-control is-invalid @enderror"
                placeholder="Masukkan Nama Desa" value="{{$profil->nama ?? old('nama') }}">
                @error('nama')
                    <span  class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-group">
                <label for=""@error('sejarah') class="text-danger" @enderror >Sejarah Desa</label>
                <textarea name="sejarah" id="" rows="3" class="form-control my-editor @error('sejarah') form-control is-invalid @enderror"
                placeholder="Masukkan Sejarah Desa">{{$profil->sejarah}}</textarea>
                @error('sejarah')
                    <span  class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-group">
                <label for=""@error('tentang') class="text-danger" @enderror >Tentang SIDESA</label>
                <textarea name="tentang" id="" rows="3" class="form-control my-editor @error('tentang') form-control is-invalid @enderror"
                placeholder="Masukkan Deskripsi Tentang SIDESA">{{$profil->tentang}}</textarea>
                @error('tentang')
                    <span  class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-group">
                <label for=""@error('fungsi') class="text-danger" @enderror >Fungsi SIDESA</label>
                <textarea name="fungsi" id="" rows="3" class="form-control  @error('fungsi') form-control is-invalid @enderror"
                placeholder="Masukkan Fungsi SIDESA">{{$profil->fungsi }}</textarea>
                @error('fungsi')
                    <span  class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-group">
                <label for=""@error('alamat') class="text-danger" @enderror >Alamat Desa</label>
                <textarea name="alamat" id="" rows="3" class="form-control  @error('alamat') form-control is-invalid @enderror"
                placeholder="Masukkan Alamat Perusahaan">{{$profil->alamat}}</textarea>
                @error('alamat')
                    <span  class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-group">
                <label for=""@error('telp') class="text-danger" @enderror >Telepon Desa</label>
                <input type="text" name="telp" class="form-control @error('telp') form-control is-invalid @enderror"
                placeholder="Masukkan no telp Perusahaan" value="{{$profil->telp ?? old('telp') }}">
                @error('telp')
                    <span  class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-group">
                <label for=""@error('email') class="text-danger" @enderror >Email Desa</label>
                <input type="email" name="email" class="form-control @error('email') form-control is-invalid @enderror"
                placeholder="Masukkan Email Perusahaan" value="{{$profil->email ?? old('email') }}">
                @error('email')
                    <span  class="text-danger"> {{ $message }} </span>
                @enderror
            </div>


            <div class="form-group">
                <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> SIMPAN</button>
                <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>
            </div>
        </form>
    </div>
</div>
@endsection



<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
