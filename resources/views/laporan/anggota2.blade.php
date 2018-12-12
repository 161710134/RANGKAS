<title>Laporan Anggota</title>
<center>
  <h4>Data Anggota</h4>
</center>
<table border="1">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Anggota</th>
      <th>Jenis Kelamin</th>
      <th>No HP</th>
      <th>Alamat</th>
      <th>Menjadi Anggota Sejak</th>
      <th>Anggota Di Ubah Pada</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1; ?>
    @php $no = 1; @endphp
    @foreach($anggota as $data)
    <tr>
      <td>{{ $no++ }}</td>
      <td>{{ $data->nama }}</td>
      <td>{{ $data->jurusan }}</td>
      <td>{{ $data->nope }}</td>
      <td>{{ $data->alamat }}</td>
      <td>{{ $data->created_at }}</td>
      <td>{{ $data->updated_at }}</td>
    </tr>
    @endforeach 
  </tbody>
</table>
<br>
Laporan Anggota Di Ambil Dari Tanggal : {{$dari}} Sampai Tanggal : {{$sampai}}