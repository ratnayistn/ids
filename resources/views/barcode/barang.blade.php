@extends('layout.app')

@section('title','Barang')

@section('breadcrumb')
	<li class="breadcrumb-item active">Data Barang</li>
@endsection

@section('custom_css')

<!-- Data tables -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset ('assets')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset ('assets')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset ('assets')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset ('assets')}}/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection

@section('title', 'Data Barang')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    	<div class="card-header">
            <h3 class="card-title">Data Barang</h3>
                        
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
                          <a href="/barang/printbarcode" class="btn btn-primary" >Cetak</a>
                          <br>
                          <br>
                            <thead>
                            <tr>
                            	<th> Barcode </th>
                              <th>ID Barang</th>
                              <th>Nama</th>
                            </tr>
                            </thead>
                            @foreach($barang as $data)
                            <tr>  
                              <td style="text-align: center">
                               <?php
                                $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                                echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data->id_barang, $generator::TYPE_CODE_128)) . '">';
                                ?>
                                <br>
                                <?= $data->id_barang?>
                                <br>
                                <?= $data->nama?>
                              </td> 
                              <td>{{ $data -> id_barang }}</td>
                              <td>{{ $data -> nama }}</td>
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

@section('js_lokal')
<script src="plugins/common/common.min.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/settings.js"></script>
<script src="js/gleek.js"></script>
<script src="js/styleSwitcher.js"></script>

<script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
<script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
<script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
@endsection