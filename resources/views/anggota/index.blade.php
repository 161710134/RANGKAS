@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12"><br>
			<div class="card card-success">
			  <div class="card-header">Data Anggota
			  	<div class="btn btn-outline-primary pull-right"><a href="{{ route('anggota.create') }}">Tambah Data</a>
			  	</div>
					</div>
			  </div>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table">
						  	<thead>
			  		<tr>
			  		  <th>No</th>
					  <th>Nama Anggota</th>
					  <th>Jenis Kelamin</th>
						<th>No Hp</th>
						<th>Alamat</th>
					  <th colspan="2">Aksi</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($anggota as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td>{{ $data->nama }}</td>
				    	<td>{{ $data->jk }}</td>
							<td>{{ $data->nope }}</td>
							<td>{{ $data->alamat }}</td>
<td>
	<a class="btn btn-warning" href="{{ route('anggota.edit',$data->id) }}">Edit</a>
</td>
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