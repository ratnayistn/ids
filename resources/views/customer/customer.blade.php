@extends('layout.app')

@section('title','Customer')

@section('breadcrumb')
	<li class="breadcrumb-item active">Data Customer</li>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    	<div class="card-header">
            <h3 class="card-title">Data Customer</h3>
                        
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"></h1>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-tools">
                    	<!--
                        <a href="/insertCustomer" class="nav-link">

                        <td>
                            <button type="button" class="btn btn-default">Tambah Data Customer Baru</button>
                        </td>
                        </a>
                    -->
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                            	<th>No</th>
                              <!-- <th>ID </th> -->
                              <th>Nama</th>
                              <th>Alamat</th>
                              <th>Kelurahan</th>
                              <th>Kecamatan</th>
                              <th>Kota </th>
                              <th>Provinsi</th>
                              <th>Foto</th>
                              <th>Path</th>
                            </tr>
                            </thead>
                            @foreach($data as $data)
                            <tr>  
                              <td>{{ $loop -> iteration }}</td>
                              <!-- <td>{{ $data -> id_cust}}</td> -->
                              <td>{{ $data -> name_cust }}</td>
                              <td>{{ $data -> alamat }}</td>
                              <td>{{ $data -> kelurahan }}</td>
                              <td>{{ $data -> kecamatan }}</td>
                              <td>{{ $data -> kota }}</td>
                              <td>{{ $data -> provinsi }}</td>
                              {{-- <td>{{ $data -> photo }}</td> --}}
                              <td><img src="{{ $data->photo }}" style="width: 100px; height: 100px"></td>
                              <td><img src="{{ asset('/storage/'.$data->path) }}" style="width: 100px; height: 100px"></td>
                            </tr>
                            @endforeach  
                          </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        
                    </div>
                    <!-- /.card-footer-->
                </div>
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>    
<!-- /.content-wrapper -->         

@endsection