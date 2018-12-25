@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12"><br>
			<div class="card card-success">
			  <div class="card-header">Data Pengembalian
			  </div>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table">
						  	<thead>
			  		<tr>
			  		  	<th>No</th>
					  	<th>Nama Peminjam</th>
						<th>Barang Yang Di Pinjam</th>
					  	<th>Jumlah Pinjam</th>
						<th>Tanggal Peminjaman</th>
						<th>Tanggal Batas Peminjaman</th>
						<th>Tanggal Pengembalian</th>
						<th>Denda</th>

					 
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($pengembalians as $data)
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
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
  } );
</script>