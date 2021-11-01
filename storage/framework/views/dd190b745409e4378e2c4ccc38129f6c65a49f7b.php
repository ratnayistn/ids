

<?php $__env->startSection('title', 'Tambah Data Barang'); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Barcode Barang</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                   <form method="POST" action="<?php echo e(url('/barcode/simpan/')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                    <input type="hidden" name="id_customer" id="id_customer" class="form-control" required="required">
                  </div>
                  <!-- <div class="form-group">
                    <label for="nama">ID Barang</label>
                    <input type="text" name="id_barang" id="id_barang" class="form-control" placeholder="ID Barang" required="required">
                  </div> -->
                  <div class="form-group">
                    <label for="alamat">Nama Barang</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Barang" required="required">
                  </div>


                </div>
              </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <input type="submit" name="simpan" value="simpan" class="btn btn-outline-info">
          </form>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ids\resources\views//tambahbarang.blade.php ENDPATH**/ ?>