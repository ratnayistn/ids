@extends('layout.app')

@section('css_custom')
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="ZXing for JS">
  <zxing-scanner [tryHarder]="true" [formats]="formats" (scanSuccess)="onScanSuccessHandler($event)"></zxing-scanner>

@endsection

@section('title', 'Scan Kunjungan')


@section('content')
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Scan Kunjungan</h3>
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

<div class="card">
  <div class="card-body">
    <div class="row">
      <!-- <input href="findToko" type="button" class="btn btn-primary" id="tokos" name="tokos" value="Details"><br> -->
      <div class="form-group col-6 col-md-6 col-lg-6">
        <label>Nama Toko</label>
        <p type="text" class="form-control"  name="nam" id="nam"></p><br>
      </div>
      <div class="form-group col-6 col-md-6 col-lg-6">
        <label>Latitude</label>
        <p type="text" class="form-control"  name="lat" id="lat"></p><br>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-6 col-md-6 col-lg-6">
        <label>Longitude</label>
        <p type="text" class="form-control"  name="long" id="long"></p><br>
      </div>
      <div class="form-group col-6 col-md-6 col-lg-6">
        <label>Accuracy</label>
        <p type="text" class="form-control"  name="ac" id="ac"></p><br>
      </div>
    </div>
  </div>
</div>
</br></br>
<div class="card">
  <div class="card-header">
    <h4>Titik Kunjungan</h4>
  </div>
  <main class="wrapper" style="padding:1em">
    <div class="card-body card-block">
      <div class="row">
        <div class="form-group col-6 col-md-6 col-lg-6">
          <label>Latitude</label><br>
          <p type="text" class="form-control"  name="lat2" id="lat2"></p><br>
        </div>
        <div class="form-group col-6 col-md-6 col-lg-6">
          <label>Longitude</label><br>
          <p type="text" class="form-control"  name="long2" id="long2"></p><br>
        </div>
        <div class="form-group col-6 col-md-6 col-lg-6">
          <label>Accuracy:</label><br>
          <p type="text" class="form-control"  name="acc2" id="acc2"></p><br>
        </div>
      </div>
    </div>  
  </main>
</div>
    <footer class="footer">
      <section class="container">
      </section>
    </footer>

  </main>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <!-- <button type="button" class="btn btn-primary" onclick="getLocation()">Geolocation</button> 
                <div class="col col-md-12" align="center">
                  <button type="button" class="btn btn-primary " onclick="konfirmasi()">Ambil Lokasi</button>
                  <button type="button" class="btn btn-success btn-sm" onclick="konfirmasi()">Konfirmasi</button>
                </div> -->
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

@endsection

@section('js_lokal')
  <script type="text/javascript" src="https://unpkg.com/@zxing/library@0.18.3-dev.7656630/umd/index.js "></script>
  <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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

                $.ajax({success: function()
                      {
                        const audio = new Audio('assets/chat_01.mp3');
                        audio.play();
                      }
                    });

                

                var id_toko = document.getElementById('result').innerHTML;
                console.log(id_toko);
                // var token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                type:"get",
                url:"findToko",
                data:"scan_id="+id_toko,
                success:function(data){
                  //console.log(scan_id);
                  for(var i=0;i<data.length;i++){
                    // $('#ket').append('<label value="'+data[i].id_barang+'">'+data[i].ny
                    document.getElementById("nam").innerHTML = data[i].nama_toko;
                    document.getElementById("lat").innerHTML = data[i].latitude;
                    document.getElementById("long").innerHTML = data[i].longitude;
                    document.getElementById("ac").innerHTML = data[i].accuracy;
                  }
                  getLocation();
                      $.ajax({success: function()
                      {
                        konfirmasi();
                      }
                    });
                }
                });
                codeReader.reset();
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

    $("#tokos").click(function(){
    var scan_id = document.querySelector('code').innerText; // find <code> tag and get text
    // var scan_id = console.log(val);
    // element.innerText = console.log(val);
    $.ajax({
      type:"get",
      url:"findToko",
      data:"scan_id="+scan_id,
      success:function(data){
        //console.log(scan_id);
        for(var i=0;i<data.length;i++){
          // $('#ket').append('<label value="'+data[i].id_barang+'">'+data[i].ny
          document.getElementById("nam").innerHTML = data[i].nama_toko;
          document.getElementById("lat").innerHTML = data[i].latitude;
          document.getElementById("long").innerHTML = data[i].longitude;
          document.getElementById("ac").innerHTML = data[i].accuracy;
        }
      }
      });
    });
   
    var lat = document.getElementById("lat2");
    var long = document.getElementById("long2");
    var acc = document.getElementById("acc2");

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.watchPosition(showPosition);
      } else { 
        lat.innerHTML = "Geolocation is not supported by this browser.";
        long.innerHTML = "Geolocation is not supported by this browser.";
        acc.innerHTML = "Geolocation is not supported by this browser.";
      }
    }
        
    function showPosition(position) {
        lat.innerHTML=position.coords.latitude;
        long.innerHTML=position.coords.longitude;
        acc.innerHTML=position.coords.accuracy;
    }

function getDistanceFromLatLonInKm(lat,long,lat2,long2) {   
  var R = 6371; // Radius of the earth in km   
  var dLat = deg2rad(lat2-lat);  // deg2rad below   
  var dLon = deg2rad(long2-long);    
  var a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(deg2rad(lat)) * Math.cos(deg2rad(lat2)) * Math.sin(dLon/2) * Math.sin(dLon/2);    
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));    
  var d = R * c; // Distance in km 
  return d; } 
 
  function deg2rad(deg) {   
    return deg * (Math.PI/180) 
  } 

  function konfirmasi(){
      var lat = document.getElementById("lat").innerHTML;
      var long = document.getElementById("long").innerHTML;
      var ac = Number(document.getElementById("ac").innerHTML);
      var lat2 = document.getElementById("lat2").innerHTML;
      var long2 = document.getElementById("long2").innerHTML;
      var acc2 = Number(document.getElementById("acc2").innerHTML);
      var jarak = Number(getDistanceFromLatLonInKm(lat,long,lat2,long2)*1000);
      console.log(jarak);
      var rataAcc = Number((ac+acc2)/2);
      console.log(rataAcc);
      if (jarak <= rataAcc)
        window.alert("Anda berada diarea toko");
      else
        window.alert("Anda tidak berada diarea toko");
    }
  </script>
@endsection