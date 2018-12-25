@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12"><br>
			<div class="card card-success">
			  <div class="card-header">Peminjaman
			  	<div class="card-title pull-right">
			  		<a href="{{ url()->previous() }}">kembali</a>
			  	</div>
			  </div>
			  <div class="card-body">

			  	<form action="{{ route('peminjaman.update',$peminjamans->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}

					<div class="form-group">
					<input type="hidden" name="id_anggota" class="form-control" value="{{ $peminjamans->Anggota->id }}"  readonly>
				</div>
				<div class="form-group">
					<input type="hidden" name="id_barang" class="form-control" value="{{ $peminjamans->Barang->id }}"  readonly>
				</div>
				<div class="form-group">
					<label class="control-label">Nama Peminjam</label>
					<select class="form-control" name="id_anggota" disabled="">
						@foreach($anggota as $data)
							<option value="{{$data->id}}" <?php if($peminjamans->id_anggota==$data->id)
							echo "selected='selected'";?>>{{$data->nama}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Barang Pinjaman</label>
					<select class="form-control" name="id_barang" disabled="">
						@foreach($barangs as $data)
							<option value="{{$data->id}}" <?php if($peminjamans->id_barang==$data->id)
							echo "selected='selected'";?>>{{$data->nama}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label class="control-label"><font style="color:grey">Jumlah Pinjam</label> 
					<input type="number" name="jumlah" value="{{ $peminjamans->jumlah }}" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label class="control-label"><font style="color:grey">Tanggal Peminjaman</label> 
					<input type="text" name="tgl_pinjam" value="{{ $peminjamans->created_at }}" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label class="control-label"><font style="color:grey">Batas Waktu Peminjaman</label> 
					<input type="text" name="tanggal_batas" value="{{ $peminjamans->tanggal_batas }}" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label class="control-label">Tanggal Pengembalian</label>  
					<input type="date" name="tanggal_kembali" class="form-control date">
				</div>

					  <div class="form-group">
			  			<button type="submit" class="btn btn-outline-danger">Kembalikan</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection
<script>// init flatpickr
  $(".date").flatpickr({
    nextArrow: '<i class="zmdi zmdi-long-arrow-right" />',
    prevArrow: '<i class="zmdi zmdi-long-arrow-left" />'
  });
</script>