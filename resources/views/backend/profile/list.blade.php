@extends('layouts.app')

@section('css')
   <link href="/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
   <!-- Datatables -->
   <link href="/libs/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
   <link href="/libs/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
   <link href="/libs/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
   <link href="/libs/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
   <link href="/libs/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
   <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
          width: 350px;
          height: 250px;
      }
        /*#aa{
          background-color: blue;
          margin-left: 30px;
        }*/

    </style>
@endsection

@section('content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
            </div>

            <div class="clearfix"></div>

            <div class="row">
             
                  
                  <div class="x_content">

                    <div class="x_panel">
                  <div class="x_title">
                    <h2>  User Profile </h2>
                    
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                       <!--  <table class="table table-bordered"> -->
                     
                          <tr>
                            <th width="30%"> Agent Name </th>
                            <td width="70%"> {{ $editdata->agent_name }}</td>
                          </tr>

                          <tr>
                            <th> Short Name  </th>
                            <td> {{ $editdata->short_name }}</td>
                          </tr>

                          <tr>
                            <th> Agent Card No  </th>
                            <td> {{ $editdata->AgentCard }}</td>
                          </tr>

                          <tr>
                            <th> Terminal  </th>
                            <td> {{ $editdata->Terminal }}</td>
                          </tr>
                              
                          <tr>
                            <th>Address </th>
                            <td> {{ $editdata->address }}</td>
                          </tr>

                          <tr>
                            <th>Township </th>
                            <td> {{ $editdata->township }}</td>
                          </tr>

                          <tr>
                            <th>Phone Number </th>
                            <td> {{ $editdata->phone_no }}</td>
                          </tr>

                          <tr>
                            <th>NRC </th>
                            <td> {{ $editdata->nrc }}</td>
                          </tr>

                          <tr>
                            <th>Balance Amount </th>
                            <td> {{ $editdata->balance_amount.' MMK' }}</td>
                          </tr>


                          <tr>
                            <th>Location </th>
                            <!-- <input class="form-control" id="location" type="text" value="{{ $editdata->location }}"> -->
                            <td> {{ $editdata->location }}<input class="form-control" id="location" type="hidden" value="{{ $editdata->location }}"></td>
                          </tr>


                        </table>
                        <!-- <div class="col-xs-4">
                          <label for="ex3">Location</label>
                          <input class="form-control" id="location" type="text" value="{{ $editdata->location }}">
                        </div> -->
                        <div class="form-group">
                            <div id="map"></div>
                        </div>
                        </div>
                    </div>
                  </div>
                </div>

                
                </div>
            </div>
            </div>
          </div>
        
        <!-- /page content -->
@endsection

@section('js')
<script>
     function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: {
            lat: {{ explode(" ", $editdata->location)[0] }}, 
            lng: {{ explode(" ", $editdata->location)[1] }}
          }
        });
        var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow;

        // document.getElementById('submit').addEventListener('click', function() {
        //   geocodeLatLng(geocoder, map, infowindow);
        // });


          geocodeLatLng(geocoder, map, infowindow);
        
    }

     function geocodeLatLng(geocoder, map, infowindow) {
        var input = document.getElementById('location').value;
        var latlngStr = input.split(' ', 2);
        var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
        geocoder.geocode({'location': latlng}, function(results, status) {
          if (status === 'OK') {
            if (results[1]) {
              map.setZoom(11);
              var marker = new google.maps.Marker({
                position: latlng,
                map: map
              });
              infowindow.setContent(results[1].formatted_address);
              infowindow.open(map, marker);
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
      }



    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ? 'Error: The Geolocation service failed.' : 'Error: Your browser doesn\'t support geolocation.');
    }
</script>

<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyB6K1CFUQ1RwVJ-nyXxd6W0rfiIBe12Q&libraries&callback=initMap">
</script>
@endsection