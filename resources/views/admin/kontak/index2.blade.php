@extends('admin.templates.default')

@section('content')

<div class="card">
    <div class="card-header">
        <h2 class="card-title">Data Pesan Masuk</h2>
    </div>
    <div class="card-body">
        <table id="dataTable" class="table table-bordered table-hover">
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
        <br/>

        {{ $contacts->links() }}
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

    $(function() {

      $('.toggle-class').change(function() {

          var status = $(this).prop('checked') == true ? 1 : 0;

          var contact_id = $(this).data('id');



          $.ajax({

              type: "GET",

              dataType: "json",

              url: '{{ route('admin.contact.status') }}',

              data: {'status': status, 'contact_id': contact_id},

              success: function(data){

                console.log(data.success)

              }

          });

      })

    })

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
