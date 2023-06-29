<table>
    <thead>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama Lengkap</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat Tempat Tinggal</th>
            <th>No Handphone</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Pekerjaan</th>
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($warga as $warga)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $warga->NIK }}</td>
            <td>{{ $warga->nama }}</td>
            <td>{{ $warga->tempat_lahir }}</td>
            <td>{{ $warga->tanggal_lahir}}</td>
            <td>{{ $warga->alamat}}</td>
            <td>{{ $warga->telp}}</td>
            <td>{{ $warga->jenis_kelamin}}</td>
            <td>{{ $warga->agama}}</td>
            <td>{{ $warga->tanggal_lahir}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
