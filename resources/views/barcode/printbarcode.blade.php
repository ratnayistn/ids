<!DOCTYPE html>
<html>
<head>
</head>
<body>

 
 <table class='table table-bordered' style="text-align: center">
  
  <tbody>
            <tr>
            @foreach($barang as $data)
                <td><?php
                    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data->id_barang, $generator::TYPE_CODE_128,$widthFactor = 1.5, $height = 20)) . '">';?>
                    <br>
                    <?= $data->id_barang?>
                    <br>
                    <?= $data->nama?>
                </td>
                @if($no++ %5 == 0)
                    </tr><tr>
                @endif
            @endforeach
  </tbody>
 </table>
 
</body>
</html>