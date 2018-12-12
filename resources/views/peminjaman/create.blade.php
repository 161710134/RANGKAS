@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12"><br>
			<div class="card card-success">
			  <div class="card-header">Tambah Data Peminjaman 
			  	<div class="card-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="card-body">
			  	<form action="{{ route('peminjaman.store') }}" method="post" id="insert_form">
			  		@csrf
					  <table id="item_table" class="table table-bordered">
            <tr id="last">
              <th style="background: green">Nama Anggota</th>
              <th style="background: green">Nama Barang</th>
              <th style="background: green">Jumlah Pinjam</th>
              <th><button type="button" name="add" class="btn btn-success btn-sm add" onclick="addrow()"><i class="fa fa-plus-square"></button></th>
            </tr>
          </table>			  		
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-outline-primary">Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection
<script>
function addrow(){
      var no = $('#item_table tr').length;
      var html = '';
      html +='<tr id="row_'+no+'">';
      html +='<td><select name="id_anggota[]" class="form-control">@foreach($anggota as $data)<option value="{{$data->id}}">{{$data->nama}}</option>@endforeach</select></td>';
	  html +='<td><select name="id_barang[]" class="form-control">@foreach($barangs as $data)<option value="{{$data->id}}">{{$data->nama}}</option>@endforeach</select></td>';
      html +='<td><input type="text" name="jumlah[]" class="form-control jumlah"/></td>';
	  html +='<td><button type="button" class="btn btn-danger btn-sm" onclick="remove('+ no +')"><i class="fa fa-minus-square"></i></button></td></tr>';
      $('#last').after(html);
      
    }
    function remove(no){
      $('#row_'+no).remove();
    }

</script>