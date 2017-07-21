@extends('layouts.app')
@section('css')
 
@endsection
@section('content')
<!-- page content -->
        
        <div class="right_col" role="main">

          <div class="row tile_count"  style="border:2px solid #a1a1a1;margin-top:15px;border-radius: 10px;margin-top:80px;">
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-minus-square-o"></i> <strong> MPT </strong> </span>
              <div class="count" style="color:#e6e600"> {{ $mpt }}</div>
              <span class="count_bottom"><i style="color:#e6e600"><h3>MMK </h3></i> <strong> From day before Yesterday(Sold Out) </strong> </span>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-minus-square-o"></i> <strong> Ooredoo </strong> </span>
              <div class="count red">{{ $ooredoo }}</div>
              <span class="count_bottom"><i class="red"><h3>MMK </h3></i> <strong> From day before Yesterday(Sold Out) </strong></span>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-minus-square-o"></i> <strong> MEC </strong> </span>
              <div class="count green"> {{ $mec }}</div>
              <span class="count_bottom"><i class="green"><h3>MMK </h3></i> <strong> From day before Yesterday(Sold Out) </strong></span>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-minus-square-o"></i> <strong> Telenor </strong> </span>
              <div class="count blue"> {{ $telenor}}</div>
              <span class="count_bottom"><i class="blue"><h3>MMK </h3></i> <strong> From day before Yesterday(Sold Out) </strong></span>
            </div>
          </div>

          <!-- -->
          <div class="row tile_count"  style="border:2px solid #a1a1a1;border-radius: 10px;">
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-minus-square-o"></i> <strong> MPT </strong></span>
              <div class="count" style="color:#e6e600">{{ $mptYes}}</div>
              <span class="count_bottom"><i style="color:#e6e600"><h3>MMK </h3></i> <strong> Sold Out On Yesterday </strong></span>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-minus-square-o"></i> <strong> Ooredoo </strong> </span>
              <div class="count red">{{ $ooredooYes }}</div>
              <span class="count_bottom"><i class="red"><h3>MMK </h3></i> <strong> Sold Out On Yesterday </strong></span>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-minus-square-o"></i> <strong> MEC </strong> </span>
              <div class="count green">{{ $mecYes }}</div>
              <span class="count_bottom"><i class="green"><h3>MMK </h3></i> <strong> Sold Out On Yesterday </strong></span>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-minus-square-o"></i> <strong> Telenor </strong> </span>
              <div class="count blue"> {{ $telenorYes }}</div>
              <span class="count_bottom"><i class="blue"><h3>MMK </h3></i> <strong> Sold Out On Yesterday </strong></span>
            </div>
            
            
          </div>

            <!-- -->
          <div class="row tile_count"  style="border:2px solid #a1a1a1;border-radius: 10px;">
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-minus-square-o"></i> <strong> MPT </strong> </span>
              <div class="count" style="color:#e6e600">{{ $mptToday}}</div>
              <span class="count_bottom"><i style="color:#e6e600"><h3>MMK </h3></i> <strong> Current Sale By Today </strong></span>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-minus-square-o"></i> <strong> Ooredoo </strong>  </span>
              <div class="count">{{ $ooredooToday }}</div>
              <span class="count_bottom"><i class="green"><h3>MMK </h3></i> <strong> Current Sale By Today </strong></span>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-minus-square-o"></i> <strong> MEC </strong> </span>
              <div class="count green">{{ $mecToday }}</div>
              <span class="count_bottom"><i class="green"><h3>MMK </h3></i> <strong> Current Sale By Today </strong></span>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-minus-square-o"></i> <strong> Telenor </strong> </span>
              <div class="count blue"> {{ $telenorToday }}</div>
              <span class="count_bottom"><i class="blue"><h3>MMK </h3></i> <strong> Current Sale By Today </strong></span>
            </div>
            
            
          </div>
        


        </div>
        <!-- /page content -->
@endsection


