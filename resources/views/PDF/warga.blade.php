<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Data Warga</h4>
		<h6><a target="_blank" href="https://www.sidesa.com">www.sidesa.com</a></h5>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>NIK</th>
                <th>NAMA Lengkap</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
				<th>Alamat</th>
                <th>Telepon</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
				<th>Pekerjaan</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($warga as $p)
			<tr>
                <td>{{ $i++ }}</td>
                <td>{{$p->NIK}}</td>
				<td>{{$p->nama}}</td>
                <td>{{$p->tempat_lahir}}</td>
                <td>{{$p->tanggal_lahir}}</td>
				<td>{{$p->alamat}}</td>
                <td>{{$p->telp}}</td>
                <td>{{$p->jenis_kelamin}}</td>
                <td>{{$p->agama}}</td>
				<td>{{$p->pekerjaan}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
