@extends('layouts.app')
@section('css')
  
@endsection
@section('content')  
<div class="right_col" role="main">
          <div class="">
            <table class="table table-striped">
              <tbody>
                  <tr>
                    <th>Total Agents</th>
                      <td><strong>{{$agentTotal}} MMK </strong></td>
                  </tr>
                  
              </tbody>
            </table>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Agent Network <small>2016</small></h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="lineChart"></canvas>
                  </div>
                </div>
              </div>

            </div>
            <div class="clearfix"></div>
            <br />
          </div>
        </div>
@endsection
@section('js')

 <!-- Chart.js -->
    <script>
      Chart.defaults.global.legend = {
        enabled: false
      };

      // Line chart
      var ctx = document.getElementById("lineChart");
      var lineChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Mon", "Bagon West", "Rakhine", "Tanintharyi", "Nay Pyi Taw", "Kachin", "Mandalay", "Ayeyarwady", "Shan State (South)", "Yangon", "Kayah", "Shan State (North)", "Kayin", "Magway", "Sagaing", "Bago East"],
          datasets: [{
            label: "Active Agents",
            backgroundColor: "rgba(38, 185, 154, 0.31)",
            borderColor: "rgba(38, 185, 154, 0.7)",
            pointBorderColor: "rgba(38, 185, 154, 0.7)",
            pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointBorderWidth: 1,
            data: [{{ $mon }}, {{ $bago_west }}, {{ $Rakhine }}, {{ $Tanintharyi }}, {{ $NayPyiTaw }}, {{ $Kachin }}, {{ $Mandalay }} , {{ $Ayeyarwady }}, {{ $shan_south }}, {{ $Yangon }}, {{ $Kayah }}, {{ $shan_north }}, {{ $kayin }}, {{ $magway }} , {{ $sagaing }} , {{ $bago_east }}]
          }]
        },
      });


    </script>
    <!-- /Chart.js -->
@endsection