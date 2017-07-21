@extends('layouts.app')

@section('css')
   <link href="/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
   <!-- Datatables -->
   <link href="/libs/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
   <link href="/libs/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
   <link href="/libs/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
   <link href="/libs/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
   <link href="/libs/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
   
@endsection

@section('content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row top_tiles">
                      <div class="animated flipInY col-lg-2 col-md-3 col-sm-6 col-xs-12"> 
                      <div class="tile-stats">
                        <div class="icon"><i class="fa fa-plus" style="font-size:43px;padding-left:25px;"></i></div>
                        <div id="all_transcount" class="count"></div>
                        <h3>All </h3>
                      </div>
                  </div>
                  <div class="animated flipInY col-lg-2 col-md-3 col-sm-6 col-xs-12"> 
                      <div class="tile-stats">
                        <div class="icon"><i class="fa fa-check" style="font-size:43px;padding-left:25px;"></i></div>
                        <div id="success_trans" class="count blue"></div>
                        <h3>Success </h3>
                      </div>
                  </div>
                  <div class="animated flipInY col-lg-2 col-md-3 col-sm-6 col-xs-12">
                      <div class="tile-stats">
                        <div class="icon"><i class="fa fa-ban" style="font-size:43px;padding-left:25px;"></i></div>
                        <div id="fail_trans" class="count red"></div>
                        <h3>Failed </h3>
                      </div>
                  </div>
                  <div class="animated flipInY col-lg-2 col-md-3 col-sm-6 col-xs-12">
                      <div class="tile-stats">
                        <div class="icon"><i class="fa fa-exclamation-triangle" style="font-size:43px;padding-left:25px;"></i></div>
                        <div id="pending_trans" class="count green"></div>
                        <h3>Pending </h3>
                      </div>
                  </div>
                  <div class="animated flipInY col-lg-2 col-md-3 col-sm-6 col-xs-12">
                      <div class="tile-stats">
                        <div class="icon"><i class="fa fa-bars" style="font-size:43px;padding-left:25px;"></i></div>
                        <div id="exception_trans" class="count purple"></div>
                        <h3>Exception </h3>
                      </div>
                  </div>
                  
              


          <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                   

                         <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="transaction-table">
                            <thead>
                                <tr>
                                <th width="5%">ID</th> 
                                <th width="20%">Transaction Date</th> 
                                <th width="10%">Card No</th> 
                                <th width="15%">Shop Name</th> 
                                <th width="10%">Status</th> 
                                <th width="20%">Transaction Detail</th> 
                                <th width="20%">Remark</th> 
                                </tr>
                            </thead>
                          </table>

                    
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        </div>
        <!-- /page content -->

        <!-- /top tiles -->

      </div>
        <!-- /page content -->
@endsection

@section('js')
<script src="/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- Datatables -->
    <script src="/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/libs/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/libs/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/libs/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/libs/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/libs/datatables.net-scroller/js/datatables.scroller.min.js"></script>
<script>
  $(document).ready(function(){

    window.setInterval(function(){
      getUser1();
    }, 5000);
    
  })

  function getUser1(){
    $.ajax({
      url: '/dahboard_allTrans',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        $('#all_transcount').text(data.all_transcount); 
      }
    })
  }
</script>
<script>
  $(document).ready(function(){
    window.setInterval(function(){
      getUser2();
    }, 5000);  
  })

  function getUser2(){
    $.ajax({
      url: '/dashboard_successTrans',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        $('#success_trans').text(data.success_trans);
      }
    })
  }
</script>
<script>
  $(document).ready(function(){
    window.setInterval(function(){
      getUser3();
    }, 5000);
  })

  function getUser3(){
    $.ajax({
      url: '/dashboard_failTrans',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        $('#fail_trans').text(data.fail_trans);
      }
    })
  }
</script>
<script>
  $(document).ready(function(){
    window.setInterval(function(){
      getUser4();
    }, 5000); 
  })

  function getUser4(){
    $.ajax({
      url: '/dashboard_pendingTrans',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        $('#pending_trans').text(data.pending_trans);
      }
    })
  }
</script>
<script>
  $(document).ready(function(){
    window.setInterval(function(){
      getUser5();
    }, 5000);
  })

  function getUser5(){
    $.ajax({
      url: '/dashboard_exceptionTrans',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        $('#exception_trans').text(data.exception_trans);
      }
    })
  }
</script>
<script>
$(function() {
  $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });

  
 var table = $('#transaction-table').DataTable({
        dom: "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>"+
            "<'row'<'col-xs-12't>>"+
            "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: {
            url: '/transaction',
            error: function(xhr, error){
                if (xhr.status === 401) {
                   window.location.href = '/login';
                }
            },
            data: function (d) {
                // d.tran_status = tran_status;
            },
        },
        columns: [
           {data: 'id', name: 'id'},
           {data: 'Date', name: 'Date'},
           {data: 'AgentCardNo', name: 'AgentCardNo'},
           {data: 'shop_name', name: 'shop_name'},
           {data: 'status', name: 'status'},
           {data: 'transaction_detail', name: 'transaction_detail'},
           {data: 'remark', name: 'remark'}

        ],
         order: [ 
         
              [1, 'desc'],
    
        ],
    });
   window.setInterval(function(){
     table.draw();
   }, 10000);
});
</script>
@endsection


