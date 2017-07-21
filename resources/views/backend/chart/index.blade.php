@extends('layouts.app')

@section('css')
   <link href="/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
   <!-- Datatables -->
   <link href="/libs/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
   <link href="/libs/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
   <link href="/libs/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
   <link href="/libs/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
   <link href="/libs/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
   <link href="/libs/AdminLTE.min.css" rel="stylesheet">
   <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */

    </style>
@endsection

@section('content')
<!-- page content -->
        <div class="right_col" role="main">
            <div class="">


               <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 widget_tally_box">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2> MPT PIN </h2>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <div id="graph_bar_mpt" style="width:100%; height:220px;"></div>
                          <div class="col-xs-12 bg-white progress_summary">
                          </div>
                        </div>
                      </div>
                </div>

                  <div class="col-md-6 col-sm-6 col-xs-12 widget_tally_box">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2> Telenor PIN </h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <div id="graph_bar_telenor" style="width:100%; height:220px;"></div>
                        <div class="col-xs-12 bg-white progress_summary">
                        </div>
                      </div>
                    </div>
                  </div>
              </div>  


              <div class="row">


                  <div class="col-md-6 col-sm-6 col-xs-12 widget_tally_box">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2> <!-- <img src="/images/ooredoo_icon.png" alt="a picture" width="60px" height="70px"> --> Ooredoo PIN </h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <div id="graph_bar_ooredoo" style="width:100%; height:220px;"></div>
                        <div class="col-xs-12 bg-white progress_summary">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 col-sm-6 col-xs-12 widget_tally_box">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>   <!-- <img src="images/mec_icon.png" alt="a picture" width="50px" height="70px">  --> MEC PIN </h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <div id="graph_bar" style="width:100%; height:220px;"></div>
                        <div class="col-xs-12 bg-white progress_summary">
                        </div>
                      </div>
                    </div>
                  </div>

              </div>   


              <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box" style="height:100px;">
                    <span class="info-box-icon bg-blue" style="height:100px;"><!-- <i class="fa fa-newspaper-o"></i> -->
                        <img src="/images/mpt_icon.PNG" alt="a picture">
                    </span>

                    <div class="info-box-content">
                      <span class="info-box-text" style="color:#337ab7;"> MPT Eload</span>
                      <span class="info-box-number"> {{ number_format($mpt[0]->closing_balance) }} Ks</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box" style="height:100px;">
                    <span class="info-box-icon bg-green" style="height:100px;"><!-- <i class="fa fa-flag-o"></i> -->
                        <img src="/images/telenor_icon.PNG" alt="a picture">
                    </span>

                    <div class="info-box-content">
                      <span class="info-box-text" style="color:#00a65a;">Telenor Eload</span>
                      <span class="info-box-number">{{ number_format($telenor[0]->closing_balance) }} Ks</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box" style="height:100px;">
                    <span class="info-box-icon bg-red" style="height:100px;"><!-- <i class="fa fa-star-o"></i> -->
                          <img src="/images/ooredoo_icon.PNG" alt="a picture">
                    </span>

                    <div class="info-box-content">
                      <span class="info-box-text" style="color:#dd4b39;">Ooredoo Eload</span>
                      <span class="info-box-number">{{ number_format($ooredoo[0]->closing_balance) }} Ks</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box" style="height:100px;">
                    <span class="info-box-icon bg-purple" style="height:100px;"><!-- <i class="fa fa-files-o"></i> -->
                        <img src="/images/mec_icon.PNG" alt="a picture">
                    </span>

                    <div class="info-box-content">
                      <span class="info-box-text" style="color:#f39c12;">MEC Eload</span>
                      <span class="info-box-number">{{ number_format($mec[0]->closing_balance) }} Ks</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
          
              </div>

            </div>
        </div>
          
        
        <!-- /page content -->
@endsection

@section('js')
<script src="/libs/raphael/raphael.min.js"></script>
<script src="/libs/morris.js/morris.min.js"></script>
<script>
  $(document).ready(function(){

    Morris.Bar({
      element: 'graph_bar',
      data: [
        { "period": "10000", "MEC": {{ $mec_10000 }} }, 
        { "period": "5000", "MEC": {{ $mec_5000 }} }, 
        { "period": "3000", "MEC": {{ $mec_3000 }} }, 
        { "period": "1000", "MEC": {{ $mec_1000 }} }, 
      ],
      xkey: 'period',
      hideHover: 'auto',
      barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
      ykeys: ['MEC'],
      labels: ['MEC'],
      barRatio: 0.4,
      xLabelAngle: 35,
      resize: true
    });

    Morris.Bar({
      element: 'graph_bar_ooredoo',
      data: [
        { "period": "20000", "Ooredoo": {{ $ooredoo_20000 }} }, 
        { "period": "10000", "Ooredoo": {{ $ooredoo_10000 }} }, 
        { "period": "5000", "Ooredoo": {{ $ooredoo_5000 }} }, 
        { "period": "3000", "Ooredoo": {{ $ooredoo_3000 }} }, 
        { "period": "1000", "Ooredoo": {{ $ooredoo_1000 }} }, 
      ],
      xkey: 'period',
      hideHover: 'auto',
      barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
      ykeys: ['Ooredoo'],
      labels: ['Ooredoo'],
      barRatio: 0.4,
      xLabelAngle: 35,
      resize: true
    });

    Morris.Bar({
      element: 'graph_bar_mpt',
      data: [
        { "period": "10000", "MPT": {{ $mpt_10000 }} }, 
        { "period": "5000", "MPT": {{ $mpt_5000 }} }, 
        { "period": "3000", "MPT": {{ $mpt_3000 }} }, 
        { "period": "1000", "MPT": {{ $mpt_1000 }} }, 
      ],
      xkey: 'period',
      hideHover: 'auto',
      barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
      ykeys: ['MPT'],
      labels: ['MPT'],
      barRatio: 0.4,
      xLabelAngle: 35,
      resize: true
    });

    Morris.Bar({
      element: 'graph_bar_telenor',
      data: [
        { "period": "10000", "Telenor": {{ $telenor_10000 }} }, 
        { "period": "6000", "Telenor": {{ $telenor_6000 }} }, 
        { "period": "5000", "Telenor": {{ $telenor_5000 }} }, 
        { "period": "3000", "Telenor": {{ $telenor_3000 }} }, 
        { "period": "1000", "Telenor": {{ $telenor_1000 }} }, 
      ],
      xkey: 'period',
      hideHover: 'auto',
      barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
      ykeys: ['Telenor'],
      labels: ['Telenor'],
      barRatio: 0.4,
      xLabelAngle: 35,
      resize: true
    });
    
  })

</script>
@endsection