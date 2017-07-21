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
                  <h2>Today(Remittance)</h2>
                  
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
                            <td>{{ number_format($remitodayResult[0]) }} </td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Close Ticket </p>
                            </td>
                            <td>{{ number_format($remitodayResult[1]) }} </td>
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
                  <h2>Today - 1(Remittance)</h2>
                 
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
                            <td>{{ number_format($remiyesterdayResult[0]) }} </td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Close Ticket </p>
                            </td>
                            <td>{{ number_format($remiyesterdayResult[1]) }} </td>
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
                  <h2>Today - 2(Remittance)</h2>
                 
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
                            <td>{{ number_format($remidayAfterResult[0]) }} </td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Close Ticket </p>
                            </td>
                            <td>{{ number_format($remidayAfterResult[1]) }} </td>
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
                  <h2>Today(Bill Payment)</h2>
                  
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
                            <td>{{ number_format($billPaytodayResult[0]) }} </td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Close Ticket </p>
                            </td>
                            <td>{{ number_format($billPaytodayResult[1]) }} </td>
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
                  <h2>Today - 1(Bill Payment)</h2>
                 
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
                            <td>{{ number_format($billpayyesterdayResult[0]) }} </td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Close Ticket </p>
                            </td>
                            <td>{{ number_format($billpayyesterdayResult[1]) }} </td>
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
                  <h2>Today - 2(Bill Payment)</h2>
                 
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
                            <td>{{ number_format($billPaydayAfterResult[0]) }} </td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Close Ticket </p>
                            </td>
                            <td>{{ number_format($billPaydayAfterResult[1]) }} </td>
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
              data: <?php echo json_encode($remitodayResult); ?>
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
              data: <?php echo json_encode($remiyesterdayResult); ?>
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
              data: <?php echo json_encode($remidayAfterResult); ?>
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
              data: <?php echo json_encode($billPaytodayResult); ?>
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
              data: <?php echo json_encode($billpayyesterdayResult); ?>
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
              data: <?php echo json_encode($billPaydayAfterResult); ?>
            }]
          },
          options: options
        });
      });
</script>

@endsection