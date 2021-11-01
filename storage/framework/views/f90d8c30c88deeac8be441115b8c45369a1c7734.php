

<?php $__env->startSection('title','Tambah Customer 1'); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<li class="breadcrumb-item active">Data Customer</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css_custom'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0"></h1>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Customer Baru 1</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          <div class="col-md-12">
                            <form action="/customer/create1" method='POST' class="form-group">
                              <?php echo csrf_field(); ?>
                             <!--  <label>Id Customer</label>
                              <input type="text" id="id_cust" name="id_cust" class="form-control select2bs4" > -->
                              
                              <label>Nama Customer</label>
                              <input type="text" id="name_cust" name="name_cust" class="form-control select2bs4" style="width: 100%;">
                              
                              <label>Alamat</label>
                              <input type="text" id="alamat" name="alamat" class="form-control select2bs4" style="width: 100%;">

                              <label>Provinsi</label>
                              <select name="provinsi" class="form-control" id="provinsi">
                                <option value="0" disabled="true" selected="true"> - Pilih Provinsi - </option>
                                <?php $__currentLoopData = $provinsi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($prov->prov_id); ?>"><?php echo e($prov->prov_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                              
                              <label>Kota</label>
                              <select name="kota" class="form-control" id="kota">
                                <option value="0" disabled="true" selected="true"> - Pilih Kota - </option>
                                
                                
                              </select>
                              
                              <label>Kecamatan</label>
                              <select name="kecamatan" class="form-control" id="kecamatan">
                                <option value="0" disabled="true" selected="true"> - Pilih Kecamatan - </option>
                                
                              </select>
                              
                              <label>Kelurahan</label>
                              <select name="kelurahan" class="form-control" id="kelurahan">
                                <option value="0" disabled="true" selected="true"> - Pilih Kelurahan - </option>
                                
                              </select>

                              <label>Ambil Foto</label>
                             <div class="row">
				                <div class="col-md-6">
				                <div id="my_camera"></div>
				                <br/>
				                <input type=button value="Take Snapshot" onClick="take_snapshot()">
				                <input type="hidden" name="photo" class="image-tag">
				                </div>
				                <div class="col-md-6">
				                    <div id="results">Your captured image will appear here...</div>
				                </div>
				                <div class="col-md-12 text-center">
				                    <br/>
				                   <!--  <button class="btn btn-success">Submit</button> -->
				                   <input type="submit" name="simpan" value="simpan" class="btn btn-outline-info">
				                </div>
				                </div>
                            </form> 

                              
                          </div>
                        </div>
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


      <!-- </div> -->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('js_lokal'); ?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<script language="JavaScript">
    Webcam.set({
        width: 320,
        height: 240,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
<script type="text/javascript">
$(document).ready(function(){
 
  $("#provinsi").change(function(){
    var prov_id=$("#provinsi").val();
    $.ajax({
      type:"get",
      url:"/findKota",
      data:"prov_id="+prov_id,
      success:function(data){
      	$('#kota').html('');
      	$('#kota').append('<option value=""> - Pilih Kota - </option>');
        for(var i=0;i<data.length;i++){
          $('#kota').append('<option value="'+data[i].city_id+'">'+data[i].city_name+'</option>');

        } 
      }

      });
  });

  $("#kota").change(function(){
    var city_id=$("#kota").val();
    $.ajax({
      type:"get",
      url:"/findKecamatan",
      data:"city_id="+city_id,
      success:function(data){
      	$('#kecamatan').html('');
      	$('#kecamatan').append('<option value=""> - Pilih Kecamatan - </option>');
        for(var i=0;i<data.length;i++){
          $('#kecamatan').append('<option value="'+data[i].dis_id+'">'+data[i].dis_name+'</option>');
        } 
      }
      });
  });

  $("#kecamatan").change(function(){
    var dis_id=$("#kecamatan").val();
    $.ajax({
      type:"get",
      url:"/findKelurahan",
      data:"dis_id="+dis_id,
      success:function(data){
      	$('#kelurahan').html('');
      	$('#kelurahan').append('<option value=""> - Pilih Kelurahan - </option>');
        for(var i=0;i<data.length;i++){
          $('#kelurahan').append('<option value="'+data[i].subdis_id+'">'+data[i].subdis_name+'</option>');
        } 
      }
      });
  });
});
</script>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ids\resources\views//customer/addcust1.blade.php ENDPATH**/ ?>