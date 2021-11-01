

<?php $__env->startSection('title','Customer'); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<li class="breadcrumb-item active">Data Customer</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>  
                              <td><?php echo e($loop -> iteration); ?></td>
                              <!-- <td><?php echo e($data -> id_cust); ?></td> -->
                              <td><?php echo e($data -> name_cust); ?></td>
                              <td><?php echo e($data -> alamat); ?></td>
                              <td><?php echo e($data -> kelurahan); ?></td>
                              <td><?php echo e($data -> kecamatan); ?></td>
                              <td><?php echo e($data -> kota); ?></td>
                              <td><?php echo e($data -> provinsi); ?></td>
                              
                              <td><img src="<?php echo e($data->photo); ?>" style="width: 100px; height: 100px"></td>
                              <td><img src="<?php echo e(asset('/storage/'.$data->path)); ?>" style="width: 100px; height: 100px"></td>
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
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ids\resources\views//customer/customer.blade.php ENDPATH**/ ?>