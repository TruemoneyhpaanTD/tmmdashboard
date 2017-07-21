@extends('layouts.app')
@section('css')
    
@endsection
@section('content')
 <div class="right_col" role="main">
          <div class="">

          <div class="row">
            <!-- pie chart For Today -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Today(MPT)</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                        <!-- <p>Top 5</p> -->
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <!-- <p class="">Device</p> -->
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <!-- <p class="">Progress</p> -->
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas id="canvas" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </td>
                      <td>
                        <table class="tile_info" style="margin-bottom:50px;">
                          <tr>
                            <td>
                              <p><i class="fa fa-square yellow"  style="color:yellow;"></i>Open Ticket </p>
                            </td>
                            <td>{{ number_format($todayResult[0]) }} </td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Close Ticket </p>
                            </td>
                            <td>{{ number_format($todayResult[1]) }} </td>
                          </tr>
                          
                          
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <!-- /Pie chart -->


            <!-- pie chart For Yesterday -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Today - 1(MPT)</h2>
                 
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                        <!-- <p>Top 5</p> -->
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <!-- <p class="">Device</p> -->
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <!-- <p class="">Progress</p> -->
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas id="canvas1" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </td>
                      <td>
                        <table class="tile_info" style="margin-bottom:50px;">
                          <tr>
                            <td>
                              <p><i class="fa fa-square yellow"  style="color:yellow;"></i>Open Ticket </p>
                            </td>
                            <td>{{ number_format($yesterdayResult[0]) }} </td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Close Ticket </p>
                            </td>
                            <td>{{ number_format($yesterdayResult[1]) }} </td>
                          </tr>
                          
                          
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <!-- /Pie chart -->

            
            <!-- pie chart For the day after tmr -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Today - 2(MPT)</h2>
                 
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                        <!-- <p>Top 5</p> -->
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <!-- <p class="">Device</p> -->
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <!-- <p class="">Progress</p> -->
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas id="canvas2" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </td>
                      <td>
                        <table class="tile_info" style="margin-bottom:50px;">
                          <tr>
                            <td>
                              <p><i class="fa fa-square yellow"  style="color:yellow;"></i>Open Ticket </p>
                            </td>
                            <td>{{ number_format($dayAfterResult[0]) }} </td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Close Ticket </p>
                            </td>
                            <td>{{ number_format($dayAfterResult[1]) }} </td>
                          </tr>
                          
                          
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <!-- /Pie chart -->
             

     

          </div>



          <div class="row">
            <!-- pie chart For Today -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Today(Ooredoo)</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                        <!-- <p>Top 5</p> -->
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <!-- <p class="">Device</p> -->
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <!-- <p class="">Progress</p> -->
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas id="canvas3" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </td>
                      <td>
                        <table class="tile_info" style="margin-bottom:50px;">
                          <tr>
                            <td>
                              <p><i class="fa fa-square yellow"  style="color:yellow;"></i>Open Ticket </p>
                            </td>
                            <td>{{ number_format($todayOResult[0]) }} </td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Close Ticket </p>
                            </td>
                            <td>{{ number_format($todayOResult[1]) }} </td>
                          </tr>
                          
                          
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <!-- /Pie chart -->


            <!-- pie chart For Yesterday -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Today - 1(Ooredoo)</h2>
                 
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                        <!-- <p>Top 5</p> -->
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <!-- <p class="">Device</p> -->
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <!-- <p class="">Progress</p> -->
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas id="canvas4" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </td>
                      <td>
                        <table class="tile_info" style="margin-bottom:50px;">
                          <tr>
                            <td>
                              <p><i class="fa fa-square yellow"  style="color:yellow;"></i>Open Ticket </p>
                            </td>
                            <td>{{ number_format($yesterdayOResult[0]) }} </td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Close Ticket </p>
                            </td>
                            <td>{{ number_format($yesterdayOResult[1]) }} </td>
                          </tr>
                          
                          
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <!-- /Pie chart -->

            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Today - 2(Ooredoo)</h2>
                 
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                        <!-- <p>Top 5</p> -->
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <!-- <p class="">Device</p> -->
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <!-- <p class="">Progress</p> -->
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas id="canvas5" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </td>
                      <td>
                        <table class="tile_info" style="margin-bottom:50px;">
                          <tr>
                            <td>
                              <p><i class="fa fa-square yellow"  style="color:yellow;"></i>Open Ticket </p>
                            </td>
                            <td>{{ number_format($dayAfterOResult[0]) }} </td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Close Ticket </p>
                            </td>
                            <td>{{ number_format($dayAfterOResult[1]) }} </td>
                          </tr>
                          
                          
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            
             

     

          </div>

          <div class="row">
            <!-- pie chart For Today -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Today(MEC)</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                        <!-- <p>Top 5</p> -->
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <!-- <p class="">Device</p> -->
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <!-- <p class="">Progress</p> -->
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas id="canvas6" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </td>
                      <td>
                        <table class="tile_info" style="margin-bottom:50px;">
                          <tr>
                            <td>
                              <p><i class="fa fa-square yellow"  style="color:yellow;"></i>Open Ticket </p>
                            </td>
                            <td>{{ number_format($todaymecResult[0]) }} </td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Close Ticket </p>
                            </td>
                            <td>{{ number_format($todaymecResult[1]) }} </td>
                          </tr>
                          
                          
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <!-- /Pie chart -->


            <!-- pie chart For Yesterday -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Today - 1(MEC)</h2>
                 
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                        <!-- <p>Top 5</p> -->
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <!-- <p class="">Device</p> -->
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <!-- <p class="">Progress</p> -->
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas id="canvas7" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </td>
                      <td>
                        <table class="tile_info" style="margin-bottom:50px;">
                          <tr>
                            <td>
                              <p><i class="fa fa-square yellow"  style="color:yellow;"></i>Open Ticket </p>
                            </td>
                            <td>{{ number_format($mecyesterdayResult[0]) }} </td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Close Ticket </p>
                            </td>
                            <td>{{ number_format($mecyesterdayResult[1]) }} </td>
                          </tr>
                          
                          
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <!-- /Pie chart -->

            
            <!-- pie chart For the day after tmr -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Today - 2(MEC)</h2>
                 
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                        <!-- <p>Top 5</p> -->
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <!-- <p class="">Device</p> -->
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <!-- <p class="">Progress</p> -->
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas id="canvas8" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </td>
                      <td>
                        <table class="tile_info" style="margin-bottom:50px;">
                          <tr>
                            <td>
                              <p><i class="fa fa-square yellow"  style="color:yellow;"></i>Open Ticket </p>
                            </td>
                            <td>{{ number_format($mecdayAfterResult[0]) }} </td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Close Ticket </p>
                            </td>
                            <td>{{ number_format($mecdayAfterResult[1]) }} </td>
                          </tr>
                          
                          
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <!-- /Pie chart -->
             

     

          </div>

          <div class="row">
            <!-- pie chart For Today -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Today(Telenor)</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                        <!-- <p>Top 5</p> -->
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <!-- <p class="">Device</p> -->
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <!-- <p class="">Progress</p> -->
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas id="canvas9" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </td>
                      <td>
                        <table class="tile_info" style="margin-bottom:50px;">
                          <tr>
                            <td>
                              <p><i class="fa fa-square yellow"  style="color:yellow;"></i>Open Ticket </p>
                            </td>
                            <td>{{ number_format($teletodayResult[0]) }} </td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Close Ticket </p>
                            </td>
                            <td>{{ number_format($teletodayResult[1]) }} </td>
                          </tr>
                          
                          
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <!-- /Pie chart -->


            <!-- pie chart For Yesterday -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Today - 1(Telenor)</h2>
                 
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                        <!-- <p>Top 5</p> -->
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <!-- <p class="">Device</p> -->
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <!-- <p class="">Progress</p> -->
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas id="canvas10" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </td>
                      <td>
                        <table class="tile_info" style="margin-bottom:50px;">
                          <tr>
                            <td>
                              <p><i class="fa fa-square yellow"  style="color:yellow;"></i>Open Ticket </p>
                            </td>
                            <td>{{ number_format($teleyesterdayResult[0]) }} </td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Close Ticket </p>
                            </td>
                            <td>{{ number_format($teleyesterdayResult[1]) }} </td>
                          </tr>
                          
                          
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <!-- /Pie chart -->

            
            <!-- pie chart For the day after tmr -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Today - 2(Telenor)</h2>
                 
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                        <!-- <p>Top 5</p> -->
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <!-- <p class="">Device</p> -->
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <!-- <p class="">Progress</p> -->
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas id="canvas11" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </td>
                      <td>
                        <table class="tile_info" style="margin-bottom:50px;">
                          <tr>
                            <td>
                              <p><i class="fa fa-square yellow"  style="color:yellow;"></i>Open Ticket </p>
                            </td>
                            <td>{{ number_format($teledayAfterResult[0]) }} </td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Close Ticket </p>
                            </td>
                            <td>{{ number_format($teledayAfterResult[1]) }} </td>
                          </tr>
                          
                          
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <!-- /Pie chart -->
             

     

          </div>
          </div>
        </div>
@endsection
@section('js')
 
<script>
setTimeout(function(){
   window.location.reload(1);
}, 900000);
</script>

<!-- /morris.js -->
<script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        new Chart(document.getElementById("canvas"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Open Ticket",
              "Close Ticket"
              
            ],
            datasets: [{
              
              backgroundColor: [
                 "#FFFF66",
                "#9B59B6"
              ],
              hoverBackgroundColor: [
                 "#FFFF66",
                "#9B59B6"
              ],
              data: <?php echo json_encode($todayResult); ?>
            }]
          },
          options: options
        });
      });
</script>

<script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        new Chart(document.getElementById("canvas1"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Open Ticket",
              "Close Ticket"
              
            ],
            datasets: [{
              
              backgroundColor: [
                 "#FFFF66",
                "#9B59B6"
              ],
              hoverBackgroundColor: [
                 "#FFFF66",
                "#9B59B6"
              ],
              data: <?php echo json_encode($yesterdayResult); ?>
            }]
          },
          options: options
        });
      });
</script>


<script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        new Chart(document.getElementById("canvas2"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Open Ticket",
              "Close Ticket"
              
            ],
            datasets: [{
              
              backgroundColor: [
                 "#FFFF66",
                "#9B59B6"
              ],
              hoverBackgroundColor: [
                 "#FFFF66",
                "#9B59B6"
              ],
              data: <?php echo json_encode($dayAfterResult); ?>
            }]
          },
          options: options
        });
      });
</script>



<script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        new Chart(document.getElementById("canvas3"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Open Ticket",
              "Close Ticket"
              
            ],
            datasets: [{
              
              backgroundColor: [
                 "#FFFF66",
                "#9B59B6"
              ],
              hoverBackgroundColor: [
                 "#FFFF66",
                "#9B59B6"
              ],
              data: <?php echo json_encode($todayOResult); ?>
            }]
          },
          options: options
        });
      });
</script>
<script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        new Chart(document.getElementById("canvas4"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Open Ticket",
              "Close Ticket"
              
            ],
            datasets: [{
              
              backgroundColor: [
                 "#FFFF66",
                "#9B59B6"
              ],
              hoverBackgroundColor: [
                 "#FFFF66",
                "#9B59B6"
              ],
              data: <?php echo json_encode($yesterdayOResult); ?>
            }]
          },
          options: options
        });
      });
</script>

<script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        new Chart(document.getElementById("canvas5"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Open Ticket",
              "Close Ticket"
              
            ],
            datasets: [{
              
              backgroundColor: [
                 "#FFFF66",
                "#9B59B6"
              ],
              hoverBackgroundColor: [
                 "#FFFF66",
                "#9B59B6"
              ],
              data: <?php echo json_encode($dayAfterOResult); ?>
            }]
          },
          options: options
        });
      });
</script>
<script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        new Chart(document.getElementById("canvas6"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Open Ticket",
              "Close Ticket"
              
            ],
            datasets: [{
              
              backgroundColor: [
                 "#FFFF66",
                "#9B59B6"
              ],
              hoverBackgroundColor: [
                 "#FFFF66",
                "#9B59B6"
              ],
              data: <?php echo json_encode($todaymecResult); ?>
            }]
          },
          options: options
        });
      });
</script>

<script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        new Chart(document.getElementById("canvas7"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Open Ticket",
              "Close Ticket"
              
            ],
            datasets: [{
              
              backgroundColor: [
                 "#FFFF66",
                "#9B59B6"
              ],
              hoverBackgroundColor: [
                 "#FFFF66",
                "#9B59B6"
              ],
              data: <?php echo json_encode($mecyesterdayResult); ?>
            }]
          },
          options: options
        });
      });
</script>


<script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        new Chart(document.getElementById("canvas8"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Open Ticket",
              "Close Ticket"
              
            ],
            datasets: [{
              
              backgroundColor: [
                 "#FFFF66",
                "#9B59B6"
              ],
              hoverBackgroundColor: [
                 "#FFFF66",
                "#9B59B6"
              ],
              data: <?php echo json_encode($mecdayAfterResult); ?>
            }]
          },
          options: options
        });
      });
</script>




<script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        new Chart(document.getElementById("canvas9"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Open Ticket",
              "Close Ticket"
              
            ],
            datasets: [{
              
              backgroundColor: [
                 "#FFFF66",
                "#9B59B6"
              ],
              hoverBackgroundColor: [
                 "#FFFF66",
                "#9B59B6"
              ],
              data: <?php echo json_encode($teletodayResult); ?>
            }]
          },
          options: options
        });
      });
</script>

<script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        new Chart(document.getElementById("canvas10"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Open Ticket",
              "Close Ticket"
              
            ],
            datasets: [{
              
              backgroundColor: [
                 "#FFFF66",
                "#9B59B6"
              ],
              hoverBackgroundColor: [
                 "#FFFF66",
                "#9B59B6"
              ],
              data: <?php echo json_encode($teleyesterdayResult); ?>
            }]
          },
          options: options
        });
      });
</script>


<script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        new Chart(document.getElementById("canvas11"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Open Ticket",
              "Close Ticket"
              
            ],
            datasets: [{
              
              backgroundColor: [
                 "#FFFF66",
                "#9B59B6"
              ],
              hoverBackgroundColor: [
                 "#FFFF66",
                "#9B59B6"
              ],
              data: <?php echo json_encode($teledayAfterResult); ?>
            }]
          },
          options: options
        });
      });
</script>

@endsection