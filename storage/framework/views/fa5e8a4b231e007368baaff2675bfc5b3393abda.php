

<?php $__env->startSection('css_custom'); ?>
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="ZXing for JS">
  <zxing-scanner [tryHarder]="true" [formats]="formats" (scanSuccess)="onScanSuccessHandler($event)"></zxing-scanner>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Scan Barcode'); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Scan Barcode</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                  <main class="wrapper" style="padding-top:2em">

<section class="container" id="demo-content">
      <div>
      <button id="startButton" class="btn btn-primary">Start</button>
        <button id="resetButton" class="btn btn-danger">Reset</button>
      </div>
      <br>

      <div>
        <video id="video" width="300" height="200" style="border: 1px solid gray"></video>
      </div>

      <div id="sourceSelectPanel" style="display:none">
        
        <select type= "hidden" id="sourceSelect" style="max-width:400px">
        </select>
      </div>

      <label>Result:</label>
      <pre><code id="result" class="form-control purchase-code" style="max-width:300px"></code></pre>

  </section>

    <footer class="footer">
      <section class="container">
      </section>
    </footer>

  </main>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
          
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js_lokal'); ?>
  <script type="text/javascript" src="https://unpkg.com/@zxing/library@0.18.3-dev.7656630/umd/index.js "></script>
  <script type="text/javascript">
    window.addEventListener('load', function () {
      let selectedDeviceId;
      const codeReader = new ZXing.BrowserMultiFormatReader()
      console.log('ZXing code reader initialized')
      codeReader.listVideoInputDevices()
        .then((videoInputDevices) => {
          const sourceSelect = document.getElementById('sourceSelect')
          selectedDeviceId = videoInputDevices[0].deviceId
          if (videoInputDevices.length >= 1) {
            videoInputDevices.forEach((element) => {
              const sourceOption = document.createElement('option')
              sourceOption.text = element.label
              sourceOption.value = element.deviceId
              sourceSelect.appendChild(sourceOption)
            })

            sourceSelect.onchange = () => {
              selectedDeviceId = sourceSelect.value;
            };

            const sourceSelectPanel = document.getElementById('sourceSelectPanel')
            sourceSelectPanel.style.display = 'block'
          }

          document.getElementById('startButton').addEventListener('click', () => {
            codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
              if (result) {
                console.log(result)
                document.getElementById('result').textContent = result.text
              }
              if (err && !(err instanceof ZXing.NotFoundException)) {
                console.error(err)
                document.getElementById('result').textContent = err
              }
            })
            console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
          })

          document.getElementById('resetButton').addEventListener('click', () => {
            codeReader.reset()
            document.getElementById('result').textContent = '';
            console.log('Reset.')
          })

        })
        .catch((err) => {
          console.error(err)
        })
    })
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ids\resources\views//barcode/scanbarcode.blade.php ENDPATH**/ ?>