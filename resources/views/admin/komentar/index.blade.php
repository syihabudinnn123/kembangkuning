@extends('admin.templates.default')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Komentar</h3>
    </div>
    <div class="card-body">
        <table id="dataTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Judul Pengumuman</th>
                    <th>Nama User</th>
                    <th>Komentar</th>
                    <th> Waktu Dikirim </th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<form action="" method="post" id="deleteForm">
    @csrf
    @method("DELETE")
    <input type="submit" value="Hapus" style="display:none">
</form>
@endsection('content')

@push('styles')
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/plugins/bs-notify.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    @include('admin.templates.partials.alerts')
    <script>
        $(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.komentar.data') }}',
                columns: [
                    { data:'DT_RowIndex', orderable:false, searchable:false},
                    { data: 'pengumuman'},
                    { data: 'user'},
                    { data : 'message'},
                    { data :'created_at'},
                    { data :'action'}
                ]
            });
        });
    </script>
@endpush

