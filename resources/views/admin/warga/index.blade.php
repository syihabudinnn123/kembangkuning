@extends('admin.templates.default')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Warga</h3>
        <a href="{{ route('admin.warga.create') }}" class="btn btn-primary "><i class="fas fa-plus"></i>Tambah warga</a>
        <a href="{{ route('admin.warga.cetak') }}" class="btn btn-secondary" target="_blank"><i class="fas fa-print"></i>Print PDF</a>
        <a href="{{ route('admin.warga.excel') }}" class="btn btn-success"><i class="fas fa-file-download"></i>Download Excell</a>
        {{-- <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
            IMPORT EXCEL
        </button> --}}
        <!-- Import Excel -->
		{{-- <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="{{ route('admin.warga.import') }}" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">

							{{ csrf_field() }}

							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		</div>
        		notifikasi form validasi --}}
		{{-- @if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
        @endif

        		{{-- notifikasi sukses --}}
		{{-- @if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $sukses }}</strong>
		@endif
    </div> --}}
    <div class="card-body">
        <table id="dataTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telp</th>
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
                ajax: '{{ route('admin.warga.data') }}',
                columns: [
                    { data :'DT_RowIndex', orderable:false, searchable:false},
                    { data :'NIK'},
                    { data :'nama'},
                    { data :'alamat'},
                    { data :'telp'},
                    {data : 'action'}
                ]
            });
        });
    </script>
@endpush
