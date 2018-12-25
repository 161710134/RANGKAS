@extends('layouts.admin')
@push('styles')
<link rel="stylesheet" href="{{asset('vendors/bower_components/lightgallery/dist/css/lightgallery.min.css')}}">
<style type="text/css">
  .table thead tr th{
  vertical-align: middle;
  text-align: center;
  }
  .table tbody tr td{
  vertical-align: middle;
  text-align: center;
  }
  #data th, #data td {
  font-size: 11px;
  }
  .text-danger 
  {
  text-transform:capitalize;
  }
  .fc-time{
  display: none;
  }
</style>
<style type="text/css"></style>
@endpush
@section('title')
Dokumentasi Pengembalian
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <h2 class="card-header">
        Laporan Pengembalian
        <div class="float-right">
          <a class="btn btn-xs btn-outline-dark badge-pill" href="{{URL::previous()}}"><i class="zmdi zmdi-close-circle"></i> Batal</a>
        </div>
      </h2>
      <div class="card-body">
        <form action="{{ url('admin/laporan/pengembalian/detail1') }}" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <label class="control-label"><font style="color:grey"> Dari Tanggal </label> 
            <input type="date" class="date" name="dari" value="{{$dari}}" readonly="">
            <label class="control-label"><font style="color:grey"> Sampai Tanggal </label> 
            <input type="date" class="date" name="sampai" value="{{$sampai}}" readonly="">&nbsp;
            <button type="submit" name="submit" class="btn btn-xs btn-outline-danger badge-pill" value="PDF"><i class="zmdi zmdi-square-down"></i> PDF</button>
          </div>
        </form>
        <center>
          <h1>Data Pengembalian</h1>
          <br>
          <h4>Dari Tanggal {{$dari}} Sampai Tanggal {{$sampai}}</h4>
        </center>
        <table id="myTable" class="table table-bordered table-hover">
          <thead class="thead-default" style="background-color:#2196F3">
            <tr>
              <th><font face color="white">No</th>
              <th><font face color="white">Nama Peminjam</th>
              <th><font face color="white">Barang Yang Dipinjam</th>
              <th><font face color="white">Jumlah Barang Yang Dipinjam</th>
              <th><font face color="white">Tanggal Peminjaman</th>
              <th><font face color="white">Tanggal Batas Peminjaman</th>
              <th><font face color="white">Tanggal Pengembalian</th>
              <th><font face color="white">Denda</th>
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
        Laporan Pengembalian Di Ambil Dari Tanggal : {{$dari}} Sampai Tanggal : {{$sampai}}
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<!-- Vendors: Data tables -->
<script src="{{asset('vendors/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('vendors/bower_components/jszip/dist/jszip.min.js')}}"></script>
<script src="{{asset('vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('vendors/bower_components/lightgallery/dist/js/lightgallery-all.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/jquery.uploadPreview.min.js')}}"></script>
<script>
  $(".date").flatpickr({
    nextArrow: '<i class="zmdi zmdi-long-arrow-right" />',
    prevArrow: '<i class="zmdi zmdi-long-arrow-left" />'
  });
  
  $(document).ready( function () {
    $('#myTable').DataTable();
  } );
</script>
@endpush 