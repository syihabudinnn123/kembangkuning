@extends('admin.templates.default')
@section('content')

<div class="card card-outline card-primary">
    <div class="row">
        <div class="container">
            <div class="col-lg-12 margin-tb">

                <div class="pull-left ">

                    <h2>Data Paralax</h2>

                </div>

                <div class="pull-right mt-1 mb-3">

                    <a class="btn btn-primary" href="{{ route('admin.paralax.create') }}"><i class="fas fa-plus-circle"></i>  Tambah Data Artikel</a>

                </div>

            </div>
        </div>


    </div>
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
    <div class="container">
        <div class="table-responsive">
        <table id="table" class="table table-bordered table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama Pengirim</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Pesan</th>
                    <th>Status</th>
                    <th> Waktu Dikirim </th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                @foreach($contacts as $c)

                <tr>
                     <td>{{ $c->id }}</td>
                   <td>{{ $c->nama }}</td>

                   <td>{{ $c->email }}</td>
                   <td>{{ $c->telp }}</td>
                   <td>{{ $c->pesan }}</td>
                   <td>

                     <input data-id="{{$c->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Terbaca" data-off="Belum Terbaca" {{ $c->status ? 'checked' : '' }}>

                  </td>
                   <td>{{ $c->created_at }}</td>
                  <td>
                     <button href="{{route('admin.contact.destroy', $c->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i> Hapus</button>
                  </td>
                </tr>

             @endforeach

             </tbody>
        </table>
    </div>

    <br/>
    {{ $contacts->links() }}
    {{-- {{ $category->links() }} --}}
    </div>
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
<script>
    $(document).ready(function() {
      $('#table').DataTable();
  } );
   </script>
@endpush
@endsection
