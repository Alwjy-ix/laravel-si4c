<h1>Data Prodi</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama Prodi</th>
        <th>Singkatan</th>
        <th>Kaprodi</th>
        <th>Fakultas</th>
    </tr>

    @foreach ($prodis as $key => $prodi)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $prodi->nama_prodi }}</td>
            <td>{{ $prodi->singkatan }}</td>
            <td>{{ $prodi->kaprodi }}</td>
            <td>{{ $prodi->fakultas->nama ?? '-' }}</td>
        </tr>
    @endforeach

</table>
