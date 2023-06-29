@extends('admin.templates.default')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Perkebunan </h3>
        <a href="{{ route('admin.perkebunan.create') }}" class="btn btn-primary ml-1"><i class="fas fa-plus"></i>Tambah Perkebunan</a>
        <a href="{{ route('admin.perkebunan.cetak') }}" class="btn btn-secondary" target="_blank"><i class="fas fa-print"></i>Print PDF</a>
        <a href="{{ route('admin.perkebunan.excel') }}" class="btn btn-success"><i class="fas fa-file-download"></i>Download Excell</a>
    </div>
    <div class="card-body">
        <table id="dataTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama Pemilik</th>
                    <th>Jenis Perkebunan</th>
                    <th>Deskripsi</th>
                    <th>Luas Lahan (m2) </th>
                    <th> Waktu Tanam </th>
                    <th> Waktu Panen </th>
                    <th> Aksi </th>
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
                ajax: '{{ route('admin.perkebunan.data') }}',
                columns: [
                    { data:'DT_RowIndex', orderable:false, searchable:false},
                    { data :'warga'},
                    { data : 'jenis_perkebunan'},
                    { data : 'deskripsi'},
                    { data :'luas_lahan'},
                    { data :'waktu_tanam'},
                    { data :'waktu_panen'},
                    { data :'action'},
                ]
            });
        });
    </script>
@endpush

