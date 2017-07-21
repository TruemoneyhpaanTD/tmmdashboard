@extends('layouts.app')
@section('css')
    
@endsection
@section('content')
 <div class="right_col" role="main">
          <div class="">
            <table class="table table-striped">
              <tbody>
                  <tr>
                    <th>Daily Sales</th>
                      <td><strong>{{$dailySaless}} MMK </strong></td>
                  </tr>
                  <tr>
                    <th>Daily Commission</th>
                      <td><strong>{{$dailyComm}} MMK </strong> </td>
                  </tr>
              </tbody>
            </table>

            <div class="clearfix"></div>

          <div class="row">
            <!-- pie chart For Remittance -->
            <div class="col-md-6 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Remittance</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%;" id="canvasTable">
                    <tr>
                      <th style="width:37%;">
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-6 col-sm-7 col-xs-7">
                          <p class="">Type</p>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-5 col-xs-5">
                          <p class="" style="padding-left:37px;">Amount</p>
                        </div>
                      </th>

                    </tr>
                    <tr>
                      <td>
                        <canvas id="canvas3" height="140" width="140" style="margin: 15px 10px 10px 0;" ></canvas>
                      </td>
                      <td>
                        <table class="tile_info">
                          <tr>
                            <td>
                              <p><i class="fa fa-square yellow"  style="color:yellow;"></i>Transfer </p>
                            </td>
                            <td id="remittance1">{{ number_format($remittanceResult[1]) }} MMK</td>
                           
                          </tr>
                          
                          <tr>
                            <td>
                              <p><i class="fa fa-square red"></i>CashOut </p>
                            </td>
                            <td id="remittance2">{{ number_format($remittanceResult[2]) }} MMK</td>
                            
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square green"></i>IRS </p>
                            </td>
                            <td id="remittance3">{{ number_format($remittanceResult[0]) }} MMK</td>
                           
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <!-- /Pie chart -->


          <!-- pie chart For Top Up-->
            <div class="col-md-6 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Top Up</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                        <!-- <p>Top 5</p> -->
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-6 col-sm-7 col-xs-7">
                          <p class="">Operator</p>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-5 col-xs-5">
                          <p class="" style="padding-left:37px;">Amount</p>
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas id="canvas1" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </td>
                      <td>
                        <table class="tile_info">
                          <tr>
                            <td>
                              <p><i class="fa fa-square yellow"  style="color:yellow;"></i>MPT </p>
                            </td>
                            <td>{{ number_format($data[3]) }} MMK</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square blue"></i>Telenor </p>
                            </td>
                            <td>{{ number_format($data[0]) }} MMK</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square red"></i>Ooredoo </p>
                            </td>
                            <td>{{ number_format($data[1]) }} MMK</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square aero" style="color:#26B99A;"></i>MEC </p>
                            </td>
                            <td>{{ number_format($data[2]) }} MMK</td>
                          </tr>
                          
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          <!-- /Pie chart -->

          <div class="col-md-12 col-sm-8 col-xs-12">
              <div class="x_panel">
               <!--  <div class="x_title">
                  <h2> Bill Payment</h2>
                    
                  <div class="clearfix"></div>
                </div> -->
                <div class="x_content">

                  <div id="mainb" style="height:350px;"></div>



                </div>
              </div>
          </div>


          </div>
          </div>
        </div>
@endsection
@section('js')
 

<script type="text/javascript"></script>
<script language="javascript">
setTimeout(function(){
   window.location.reload(1);
}, 900000);
</script>
<!-- morris.js -->
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
              "Telenor",
              "Ooredoo",
              "MEC",
              "MPT"
             
            ],
            datasets: [{
              
            
              backgroundColor: [
                
                "#4169E1",
                "#ff4000",
                "#26B99A",
                "#FFFF00",
             
              ],
              // "#FFFF00",
              //   "#4169E1",
              //   "#ff4000",
              //   "#26B99A",
               
              hoverBackgroundColor: [
                "#4169E1",
                "#ff4000",
                "#26B99A",
                "#FFFF00",
               
              ],
               data: <?php echo json_encode($data); ?>
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
          // tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          // "IRS",
          //      "Transfer",
          //      "CashOut",
          data: {
            labels: [
              "IRS",
              "Transfer",
              "CashOut",

            ],
            datasets: [{
             
            
              backgroundColor: [
               '#33cc33',
                "#e6e600",
                "#ff471a",
              
              ],
              hoverBackgroundColor: [
                '#33cc33',
                "#e6e600",
                "#ff471a",
              ],
              data: <?php echo json_encode($remittanceResult); ?>
            }]
          },
          options: options
        });
      });
</script>
<!-- /morris.js -->
<script>
      var theme = {
          color: [
              '#FFFF00', '#4169E1', '#2E8B57', '#3498DB', 
              '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7',
              // '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
          ],

          title: {
              itemGap: 3,
              textStyle: {
                  fontWeight: 'normal',
                  color: '#408829'
              }
          },

          dataRange: {
              color: ['#1f610a', '#97b58d']
          },

          toolbox: {
              color: ['#408829', '#408829', '#408829', '#408829']
          },

          tooltip: {
              backgroundColor: 'rgba(0,0,0,0.5)',
              axisPointer: {
                  type: 'line',
                  lineStyle: {
                      color: '#408829',
                      type: 'dashed'
                  },
                  crossStyle: {
                      color: '#408829'
                  },
                  shadowStyle: {
                      color: 'rgba(200,200,200,0.3)'
                  }
              }
          },

          dataZoom: {
              dataBackgroundColor: '#eee',
              fillerColor: 'rgba(64,136,41,0.2)',
              handleColor: '#408829'
          },
          grid: {
              borderWidth: 0
          },

          categoryAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },

          valueAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitArea: {
                  show: true,
                  areaStyle: {
                      color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },
          timeline: {
              lineStyle: {
                  color: '#408829'
              },
              controlStyle: {
                  normal: {color: '#408829'},
                  emphasis: {color: '#408829'}
              }
          },

          k: {
              itemStyle: {
                  normal: {
                      color: '#68a54a',
                      color0: '#a9cba2',
                      lineStyle: {
                          width: 1,
                          color: '#408829',
                          color0: '#86b379'
                      }
                  }
              }
          },
          map: {
              itemStyle: {
                  normal: {
                      areaStyle: {
                          color: '#ddd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  },
                  emphasis: {
                      areaStyle: {
                          color: '#99d2dd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  }
              }
          },
          force: {
              itemStyle: {
                  normal: {
                      linkStyle: {
                          strokeColor: '#408829'
                      }
                  }
              }
          },
          chord: {
              padding: 4,
              itemStyle: {
                  normal: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  },
                  emphasis: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  }
              }
          },
          gauge: {
              startAngle: 225,
              endAngle: -45,
              axisLine: {
                  show: true,
                  lineStyle: {
                      color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                      width: 8
                  }
              },
              axisTick: {
                  splitNumber: 10,
                  length: 12,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              axisLabel: {
                  textStyle: {
                      color: 'auto'
                  }
              },
              splitLine: {
                  length: 18,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              pointer: {
                  length: '90%',
                  color: 'auto'
              },
              title: {
                  textStyle: {
                      color: '#333'
                  }
              },
              detail: {
                  textStyle: {
                      color: 'auto'
                  }
              }
          },
          textStyle: {
              fontFamily: 'Arial, Verdana, sans-serif'
          }
      };

      var echartBar = echarts.init(document.getElementById('mainb'), theme);

      echartBar.setOption({
        title: {
          text: 'BillPayment',
          // subtext: 'Graph Sub-text'
        },
        tooltip: {
          trigger: 'axis'
        },
        legend: {
          data: <?php echo json_encode($billPaymentData); ?>
        },
        toolbox: {
          show: false
        },

        calculable: false,
        xAxis: [{
          type: 'category',
          // data: ['Aeon                                      CNP                                  HelloCabs                                Titan                                        Bnf']
          data: ['Payment Type']
        }],
        yAxis: [{
          type: 'value'
        }],
        series: <?php echo json_encode($echartBarData); ?>,
      });


</script>

@endsection