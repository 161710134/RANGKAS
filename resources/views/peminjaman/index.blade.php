@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12"><br>
			<div class="card card-success">
			  <div class="card-header">Peminjaman
			  	<div class="btn btn-outline-primary pull-right">
			  		<a href="{{ route('peminjaman.create') }}">Tambah Data</a>
			  	</div>
			  </div>
			  <div class="card-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
					  <th>Nama peminjam</th>
					  <th>Nama Barang</th>
					  <th>Jumlah Barang Yang Dipinjam</th>
					  <th>Tanggal Pinjam</th>
					  <th>Tanggal Batas Pinjam</th>
					  <th colspan="3">Action</th>
			  		</tr>	
				  	</thead>
				  	<tbody>
				  		@php $no = 1; @endphp
				  		@foreach($peminjamans as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td>{{ $data->anggota->nama }}</td>
				    	<td>{{ $data->barang->nama }}</td>
				    	<td><center>{{ $data->jumlah }}</center></td>
						<td>{{ $data->created_at }}</td>
						<td>{{ $data->tanggal_batas }}</td>
				    	
				    	@role('admin')
						<!-- <td>
							<a class="btn btn-outline-warning" href="{{ route('peminjaman.edit',$data->id) }}">Edit</a>
						</td> -->
						<td>
							<a href="{{ route('peminjaman.show',$data->id) }}" class="btn btn-outline-success">Show</a>
						</td>
						<!-- <td>
							<form method="post" action="{{ route('peminjaman.destroy',$data->id) }}">
								@csrf
								<input type="hidden" name="_method" value="DELETE">

								<button type="submit" class="btn btn-outline-danger"  onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">Delete</button>
							</form>
						</td> -->
						@else('member')
						<td>
							<form method="post" action="{{ route('peminjaman.destroy',$data->id) }}">
								@csrf
								<input type="hidden" name="_method" value="DELETE">

								<button type="submit" class="btn btn-outline-danger"  onclick="return confirm('Apakah anda yakin untuk mengembalikan barang ini?')">Kembalikan</button>
							</form>
						</td>
						@endrole
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