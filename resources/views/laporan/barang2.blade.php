<title>Laporan Barang</title>
<center>
  <h4>Data Barang</h4>
</center>
<table border="1">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Barang</th>
      <th>Stok Barang</th>
      <th>Keadaan Barang</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1; ?>
    @php $no = 1; @endphp
    @foreach($barang as $data)
    <tr>
      <td>{{ $no++ }}</td>
      <td>{{ $data->nama }}</td>
      <td>{{ $data->stok }}</td>
      <td>{{ $data->keadaan }}</td>
    </tr>
    @endforeach 
  </tbody>
</table>
<br>
Laporan Barang Di Ambil Dari Tanggal : {{$dari}} Sampai Tanggal : {{$sampai}}