

<?php $__env->startSection('title','Lokasi Toko'); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<li class="breadcrumb-item active">Data Lokasi Toko</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_css'); ?>

<!-- Data tables -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset ('assets')); ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset ('assets')); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo e(asset ('assets')); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset ('assets')); ?>/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    	<div class="card-header">
            <h3 class="card-title">Data Lokasi Toko</h3>
                        
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
    
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                         <thead>
                            <tr>
                              <th>Barcode</th>
                              <th>ID Toko</th>
                              <th>Nama Toko</th>
                              <th>Latitude</th>
                              <th>Longitude</th>
                              <th>Accuracy</th>
                              <th>Opsi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $toko; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="text-align: center"><?php
                                $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                                echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data->barcode, $generator::TYPE_CODE_128,$widthFactor = 1.5, $height = 20)) . '">';?>
                     
                                <br>
                                <?php echo e($data->barcode); ?>

                                </td>
                                <td><?php echo e($data->barcode); ?></td>
                                <td><?php echo e($data->nama_toko); ?></td>
                                <td><?php echo e($data->latitude); ?></td>
                                <td><?php echo e($data->longitude); ?></td>
                                <td><?php echo e($data->accuracy); ?></td>
                                <td>
                                  <a href="#" class="btn btn-icon btn-success">
                                    <i class="fa fa-file"></i>
                                    Cetak
                                  </a>
                                </td>
                                <!-- <td><a href="/data_toko/deleteToko/<?php echo e($data->barcode); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin untuk menghapus?');">HAPUS</a>
                                </td> -->
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js_lokal'); ?>
<script src="<?php echo e(asset('asset/plugins/tables/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('asset/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('asset/plugins/tables/js/datatable-init/datatable-basic.min.js')); ?>"></script>

<script>
    $(document).ready(function () {
    $('#barcode').DataTable();
    } );
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ids\resources\views//location/lokasi_toko.blade.php ENDPATH**/ ?>