<!DOCTYPE html>
<html>
<head>
</head>
<body>

 
 <table class='table table-bordered' style="text-align: center">
  
  <tbody>
            <tr>
            <?php $__currentLoopData = $barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td><?php
                    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data->id_barang, $generator::TYPE_CODE_128,$widthFactor = 1.5, $height = 20)) . '">';?>
                    <br>
                    <?= $data->id_barang?>
                    <br>
                    <?= $data->nama?>
                </td>
                <?php if($no++ %5 == 0): ?>
                    </tr><tr>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
 </table>
 
</body>
</html><?php /**PATH C:\xampp\htdocs\ids\resources\views/printbarcode.blade.php ENDPATH**/ ?>