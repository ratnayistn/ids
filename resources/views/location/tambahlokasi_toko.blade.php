@extends('layout.app')

@section('title', 'Tambah Lokasi Toko')


@section('content')
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Lokasi Toko</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                   <form method="POST" action="{{url('/tambahtoko/simpan/')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <input type = "hidden" class = "form-control" id="barcode" name = "barcode" placeholder = "" disabled>
                  </div>
                  <div class="form-group">
                    <label>Nama Toko</label>
                    <input type="text" id="nama_toko" name="nama_toko" class="form-control select2bs4" style="width: 100%;">
                  </div>
                  <div class="form-group">
                    <label>Latitude</label>
                    <input type="text" id="latitude" name="latitude" class="form-control select2bs4" style="width: 100%;">
                  </div>
                  <div class="form-group">
                    <label>Longitude</label>
                    <input type="text" id="longitude" name="longitude" class="form-control select2bs4" style="width: 100%;">
                  </div>
                  <div class="form-group">
                     <label>Accuracy</label>
                    <input type="text" id="accuracy" name="accuracy" class="form-control select2bs4" style="width: 100%;">
                  </div>

                </div>
              </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="button" class="btn btn-primary" onclick="getLocation()">Geolocation</button> 
          <input type="submit" value="Submit" class="btn btn-success">
          </form>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
@endsection

@section('js_lokal')
<script>
var lat = document.getElementById("latitude");
var long = document.getElementById("longitude");
var acc = document.getElementById("accuracy");

function getLocation() 
{
    if (navigator.geolocation) {
        navigator.geolocation.watchPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) 
{
    lat.value=position.coords.latitude;
    long.value=position.coords.longitude;
    acc.value=position.coords.accuracy;
}
</script>
@endsection