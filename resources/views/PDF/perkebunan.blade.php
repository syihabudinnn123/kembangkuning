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
		<h5>Laporan Data Perkebunan</h4>
		<h6><a target="_blank" href="https://www.sidesa.com">www.sidesa.com</a></h5>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>id</th>
                <th>Jenis Perkebunan</th>
                <th>Deskripsi</th>
                <th>Luas Lahan (m2)</th>
				<th>Waktu Tanam</th>
                <th>Waktu Panen</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($perkebunan as $p)
			<tr>
                <td>{{ $i++ }}</td>
                <td>{{$p->id}}</td>
				<td>{{$p->jenis_perkebunan}}</td>
                <td>{{$p->deskripsi}}</td>
                <td>{{$p->luas_lahan}}</td>
				<td>{{$p->waktu_tanam}}</td>
                <td>{{$p->waktu_panen}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
