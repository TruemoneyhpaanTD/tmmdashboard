@extends('layouts.app')

@section('content')
<!-- page content -->
   <div class="right_col" role="main">
      <div class="">
        
         <div class="row">
            
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title form-horizontal">
                  <div class="form-group">
                      <label class="col-md-1 control-label">Province</label>
                      <div class="col-md-2">
                         <select name="city" id="city" onchange="showMap()" class="form-control">
                            <option value="all"> All </option>
                            <option value="Ayeyarwady"> Ayeyarwady </option>
                            <option value="Shan State (South)"> Shan State (South) </option> 
                            <option value="Kachin"> Kachin </option> 
                            <option value="Mandalay"> Mandalay </option> 
                            <option value="Magway"> Magway </option> 
                            <option value="Kayah"> Kayah </option> 
                            <option value="Tanintharyi"> Tanintharyi </option> 
                            <option value="Nay Pyi Taw"> Nay Pyi Taw </option> 
                            <option value="Chin"> Chin </option> 
                            <option value="Kayin"> Kayin </option> 
                            <option value="Sagaing"> Sagaing </option> 
                            <option value="Yangon"> Yangon </option> 
                            <option value="Mon"> Mon </option> 
                            <option value="Rakhine"> Rakhine </option> 
                            <option value="Bago West"> Bago West </option> 
                            <option value="Bago East"> Bago East </option> 
                            <option value="Shan State (North)"> Shan State (North) </option> 
                            <option value="Shan State (East)"> Shan State (East) </option> 
                         </select>
                      </div>
                    
                      <label class="col-md-2 control-label">Agent Type</label>
                      <div class="col-md-2">
                        <select name="agentType" id="agentType" class="form-control" onchange="showMap()">
                          <option value="all">All</option>
                          <option value="TrueAgent">TrueAgent</option>
                          <option value="TrueAGDAgent">TrueAGDAgent</option>
                          <option value="AGDAgent">AGDAgent</option>
                        </select> 
                      </div>
                  </div>
                </div>
            
                <div id="map_warp">   
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
      $(function(){
        showMap();
      })
      function showMap() {
          $.ajax({
              url: '/show_map',
              type: 'GET',
              dataType: 'html',
              data: { 
                city: $('#city').val(),
                agentType: $('#agentType').val()
              },
              success : function(data){
                $('#map_warp').empty();
                $('#map_warp').append(data);
              },
              error: function(xhr, error){
                  if (xhr.status === 401) {
                    window.location.href = '/login';
                  }else{
                    alert(error);
                  }
              },
            })
        }
      
    </script>
    
@endsection