@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12"><br>
			<div class="card card-success">
			  <div class="card-header">Tambah Data Anggota 
			  	<div class="card-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="card-body">
			  	<form action="{{ route('anggota.store') }}" method="post" id="insert_form">
			  		@csrf
					  <table id="item_table" class="table table-bordered">
            <tr id="last">
              <th style="background: green">Nama Anggota</th>
              <th style="background: green">Jenis Kelamin</th>
              <th style="background: green">No Hp</th>
			  <th style="background: green">Alamat</th>
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
      html +='<td><input type="text" name="nama[]" class="form-control nama"/></td>';
	  html +='<td><input type="text" name="jk[]" class="form-control jk"/></td>';
      html +='<td><input type="text" name="nope[]" class="form-control nope"/></td>';
	  html +='<td><input type="text" name="alamat[]" class="form-control alamat"/></td>';
	  html +='<td><button type="button" class="btn btn-danger btn-sm" onclick="remove('+ no +')"><i class="fa fa-minus-square"></i></button></td></tr>';
      $('#last').after(html);
      
    }
    function remove(no){
      $('#row_'+no).remove();
    }

</script>