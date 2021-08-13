@extends('layouts.admin')
@section('title','Add New Vendor')
@section('head')
<link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps.css'>
<link rel="stylesheet" type='text/css' href="{{asset('vendor/map/css/style.css')}}">
<script onload="mapContent();" src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps-web.min.js"
    defer></script>
@endsection

@section('content')

<div class="app-content content" >
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('admin.vendors.index')}}"> المتاجر </a>
                            </li>
                            <li class="breadcrumb-item active">إضافة متجر
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form"> إضافة متجر </h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            {{-- @include('admin.includes.alerts.success')
                            @include('admin.includes.alerts.errors') --}}
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" action="{{route('admin.vendors.store')}}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> بيانات المتجر </h4>
                                            <input type="hidden" id="active" name="active" value="" >
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name"> الاسم </label>
                                                        <input type="text" value="" id="name"
                                                               class="form-control"
                                                               placeholder="ادخل الاسم   "
                                                               name="name">
                                                               @error('name')
                                                               <span class="text-danger">
                                                            {{$message}}
                                                            </span>
                                                               @enderror
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="direction"> القسم </label>

                                                        <select name="catigory_id" id="catigory_id" class="select2 form-control">
                                                            <optgroup label="من فضلك أختر القسم ">
                                                        @isset($activeCatigories)
                                                        @foreach ($activeCatigories as $category)
                                                                <option value="{{$category->id}}"> {{$category ->name}}</option>
                                                        @endforeach
                                                        @endisset
                                                    </optgroup>
                                                </select>
                                                        @error('catigory_id')
                                                        <span class="text-danger">
                                                        {{$message}}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                            </div>


                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="abbr"> الهاتف </label>
                                                        <input type="text" value="" id="phone"
                                                               class="form-control"
                                                               placeholder="ادخل رقم الهاتف  "
                                                               name="phone">
                                                               @error('phone')
                                                               <span class="text-danger">
                                                            {{$message}}
                                                            </span>
                                                               @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="locale"> البريد الالكتروني </label>
                                                        <input type="email" value="" id="email"
                                                               class="form-control"
                                                               placeholder="ادخل البريد الالكتروني"
                                                               name="email">
                                                               @error('email')
                                                               <span class="text-danger">
                                                            {{$message}}
                                                            </span>
                                                               @enderror
                                                    </div>
                                                </div>


                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="abbr"> الرقم السري </label>
                                                    <input type="password" value="" id="password"
                                                           class="form-control"
                                                           placeholder="ادخل الباسورد "
                                                           name="password">
                                                           @error('password')
                                                           <span class="text-danger">
                                                        {{$message}}
                                                        </span>
                                                           @enderror
                                                </div>
                                            </div>



                                            <div class="col-md-6">
                                                <label for="formFile" class="form-label">اللوجو</label>
                                                <input class="form-control" type="file" id="logo" name="logo" />
                                            @error('logo')
                                            <span class="text-danger">
                                                {{$message}}
                                                </span>
                                            @enderror
                                            </div>




                                        </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1">
                                                        <input type="checkbox" name=""
                                                               id="status"
                                                               class="switchery" data-color="success"
                                                           checked />
                                                        <label for="active"
                                                               class="card-title ml-1">الحالة </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="locale"> العنوان </label>
                                                        <input type="text" value="" id="address"
                                                               class="form-control"
                                                               placeholder="ادخل العنوان "
                                                               name="address">
                                                               @error('address')
                                                               <span class="text-danger">
                                                            {{$message}}
                                                            </span>
                                                               @enderror
                                                    </div>
                                                </div>

                                            </div>


                                        <div id="map"></div>
                                        </div>


                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>
                                            <button type="submit" class="btn btn-primary" onclick="passData()">
                                                <i class="la la-check-square-o"></i> حفظ
                                            </button>
                                        </div>
                                        <input type="hidden" name="latitude" value="" id="latitude">
                                        <input type="hidden" name="longitude" value="" id="longitude">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>
@section('script')
<script>
    function passData(){
        if(document.getElementById('status').checked){
          document.getElementById('active').value = 1;
        }else{
          document.getElementById('active').value = 0;
        }
  }
  </script>

  <script>


//https://api.tomtom.com/search/2/reverseGeocode/30.7817298%2C31.025758099999997.json?key=oyYhV6OXAo7oc9MF7axlg1lzfkCLEtVL

function mapContent() {
    var Latitude;
var Longitude;
var flag = false;
var interv;
var myAddress;
//latitude and longitude
$.getJSON('https://api.db-ip.com/v2/free/self', function(data) {
        //  var addressData = JSON.stringify(data, null, 2);
        myAddress = data.city + ',' + data.stateProv +',' + data.countryName;
      });
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (position) {
        Latitude = position.coords.latitude;
        Longitude = position.coords.longitude;
        document.getElementById('latitude').value = Latitude;
        document.getElementById('longitude').value = Longitude;

    });
} else {
    alert("Geolocation is not supported by this browser.");
}
interv = setInterval(function () {
        if (Latitude != null || Longitude != null) {
            flag = true;
        }
        if(flag){
            var api_key = 'oyYhV6OXAo7oc9MF7axlg1lzfkCLEtVL';
            var latAndLong = { lat: Latitude, lng: Longitude };
            var zoomLevel = 14;
            var yourAddress = myAddress;

            var map = tt.map({
                container: 'map',
                key: api_key,
                center: latAndLong,
                zoom: zoomLevel
            });

            var marker = new tt.Marker().setLngLat(latAndLong).addTo(map);

            // FOR CUSTOM MARKER
            //var customMarker = document.createElement('div');
            //customMarker.id = 'marker';
            //var marker = new tt.Marker({element: customMarker}).setLngLat(latAndLong).addTo(map);

            var popupOffsets = {
                top: [0, 0],
                bottom: [0, -70],
                'bottom-right': [0, -70],
                'bottom-left': [0, -70],
                left: [25, -35],
                right: [-25, -35]
            }

            var popup = new tt.Popup({ offset: popupOffsets }).setHTML(yourAddress);
            marker.setPopup(popup).togglePopup();
            clearInterval(interv);
        }
         $.getJSON('https://api.db-ip.com/v2/free/self', function(data) {
        //  var addressData = JSON.stringify(data, null, 2);
        var addressData = data.city + ',' + data.stateProv +',' + data.countryName + ',' + data.countryCode + ',' + data.continentName;
        document.getElementById('address').value = addressData;
      });
    }, 3000);
}

      </script>

@endsection

@endsection
