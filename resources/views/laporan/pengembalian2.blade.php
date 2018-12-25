<title>Laporan Pengembalian</title>
<center>
  <h4>Data Pengembalian</h4>
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
      <th>Tanggal Pengembalian</th>
      <th>Denda</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1; ?>
    @php $no = 1; @endphp
    @foreach($pengembalian as $data)
    <tr>
      <td>{{ $no++ }}</td>
      <td>{{ $data->anggota->nama }}</td>
      <td>{{ $data->barang->nama }}</td>
      <td>{{ $data->jumlah }}</td>
      <td>{{ $data->tgl_pinjam }}</td>
      <td>{{ $data->tanggal_batas }}</td>
      <td>{{ $data->tanggal_kembali }}</td>
      <td>Rp. {{number_format($data->denda) }}</td>
    </tr>
    @endforeach 
  </tbody>
</table>
<br>
Laporan Pengembalian Di Ambil Dari Tanggal : {{$dari}} Sampai Tanggal : {{$sampai}}