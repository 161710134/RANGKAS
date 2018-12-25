<title>Laporan Peminjaman</title>
<center>
  <h4>Data Peminjaman</h4>
</center>
<table border="1">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Peminjam</th>
      <th>Barang Yang Dipinjam</th>
      <th>Jumlah Barang Yang Dipinjam</th>
      <th>Tanggal Peminjaman</th>
      <th>Tanggal Batas Peminjaman</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1; ?>
    @php $no = 1; @endphp
    @foreach($peminjaman as $data)
    <tr>
      <td>{{ $no++ }}</td>
      <td>{{ $data->anggota->nama }}</td>
      <td>{{ $data->barang->nama }}</td>
      <td>{{ $data->jumlah }}</td>
      <td>{{ $data->created_at }}</td>
      <td>{{ $data->tanggal_batas }}</td>
    </tr>
    @endforeach 
  </tbody>
</table>
<br>
Laporan Peminjaman Di Ambil Dari Tanggal : {{$dari}} Sampai Tanggal : {{$sampai}}