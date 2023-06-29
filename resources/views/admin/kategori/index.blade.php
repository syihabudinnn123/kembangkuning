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
        <h2 class="card-title">Data Kategori</h2>

    </div>
    <div class="card-body">
        <a href="{{ route('admin.kategori-surat.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                @foreach($kategori as $c)

                   <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->nama_kategori }}</td>
                     <td>
                         <a href="{{ route('admin.kategori-surat.edit', $c->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button href="{{route('admin.kategori-surat.destroy', $c->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i> Hapus</button>
                     </td>
                   </tr>

                @endforeach

             </tbody>
        </table>
        <br/>

        
    </div>
</div>
<form action="" method="post" id="deleteForm">
    @csrf
    @method("DELETE")
    <input type="submit" value="Hapus" style="display:none">
</form>
@push('styles')


<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

@endpush

@push('scripts')
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script>
      $('button#delete').on('click', function(e){
          e.preventDefault();

          var href = $(this).attr('href');

          Swal.fire({
              title: 'Apakah Kamu yakin akan menghapus data ini?',
              text: "Data yang sudah dihapus tidak dapat dikembalikan!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, Hapus!'
              }).then((result) => {
              if (result.value) {
                  document.getElementById('deleteForm').action = href;
                  document.getElementById('deleteForm').submit();
                      Swal.fire(
                      'Berhasi Dihapus!',
                      'Data Kamu Berhasil Dihapus.',
                      'success'
                      )
                  }
              })


      })
  </script>
  @endpush
@endsection
