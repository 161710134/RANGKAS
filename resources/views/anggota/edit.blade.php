@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12"><br>
			<div class="card card-success">
			  <div class="card-header">Edit Data Anggota
			  	<div class="card-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('anggota.update',$anggota->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Peminjan</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $anggota->nama }}"  required>
			  			@if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
			  		
					  <div class="form-group {{ $errors->has('jk') ? ' has-error' : '' }}">
			  			<label class="control-label">Jenis Kelamin</label>	
			  			<input type="text" name="jk" class="form-control" value="{{ $anggota->jk }}"  required>
						  @if ($errors->has('jk'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jk') }}</strong>
                            </span>

                        @endif
			  		</div>
					  <div class="form-group {{ $errors->has('nope') ? ' has-error' : '' }}">
			  			<label class="control-label">No Hp</label>	
			  			<input type="text" name="nope" class="form-control" value="{{ $anggota->nope }}"  required>
			  			@if ($errors->has('nope'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nope') }}</strong>
                            </span>

                        @endif
			  		</div>
					  <div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }}">
			  			<label class="control-label">Alamat</label>	
			  			<input type="text" name="alamat" class="form-control" value="{{ $anggota->alamat }}"  required>
			  			@if ($errors->has('alamat'))
                            <span class="help-block">
                                <strong>{{ $errors->first('alamat') }}</strong>
                            </span>

                        @endif
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-success">Edit</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
	</div>
</div>
@endsection