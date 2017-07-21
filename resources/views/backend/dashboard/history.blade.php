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

                  <div id="get_all_trans" class="animated flipInY col-lg-2 col-md-3 col-sm-6 col-xs-12"> 
                      <div class="tile-stats" id="get_all_trans1">
                        <div class="icon"><i class="fa fa-plus" style="font-size:43px;padding-left:25px;"></i></div>
                        <div id="all_transcount" class="count"></div>
                        <h3>All</h3>
                      </div>
                  </div>
                  <div id="get_success_trans" class="animated flipInY col-lg-2 col-md-3 col-sm-6 col-xs-12"> 
                      <div class="tile-stats" id="get_success_trans1">
                        <div class="icon"><i class="fa fa-check" style="font-size:43px;padding-left:25px;"></i></div>
                        <div id="success_trans" class="count blue"></div>
                        <h3>Success </h3>
                      </div>
                  </div>
                  <div id="get_fail_trans" class="animated flipInY col-lg-2 col-md-3 col-sm-6 col-xs-12">
                      <div class="tile-stats" id="get_fail_trans1">
                        <div class="icon"><i class="fa fa-ban" style="font-size:43px;padding-left:25px;"></i></div>
                        <div id="fail_trans" class="count red"></div>
                        <h3>Failed </h3>
                      </div>
                  </div>
                  <div id="get_pending_trans" class="animated flipInY col-lg-2 col-md-3 col-sm-6 col-xs-12">
                      <div class="tile-stats" id="get_pending_trans1">
                        <div class="icon"><i class="fa fa-exclamation-triangle" style="font-size:43px;padding-left:25px;"></i></div>
                        <div id="pending_trans" class="count green"></div>
                        <h3>Pending </h3>
                      </div>
                  </div>
                  <div id="get_exception_trans" class="animated flipInY col-lg-2 col-md-3 col-sm-6 col-xs-12">
                      <div class="tile-stats" id="get_exception_trans1">
                        <div class="icon"><i class="fa fa-bars" style="font-size:43px;padding-left:25px;"></i></div>
                        <div id="exception_trans" class="count purple"></div>
                        <h3>Exception </h3>
                      </div>
                  </div>
              


          <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">
                  <label class="col-md-1 control-label">Date Range</label>
                        <div class="col-md-4">
                           <div class="input-group input-daterange">
                              <input type="text" class="form-control" name="start" id="start" placeholder="Date Start" />
                              <span class="input-group-addon">to</span>
                              <input type="text" class="form-control" name="end" id="end" placeholder="Date End" />
                           </div>
                        </div>
                        <button id="submit" class="col-md-1 btn btn-success">Submit</button>
                    <div class="clearfix"></div>
                </div>
                  <div class="x_content">
                      <div class="table-responsive">
                         <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="transactionHistory-table">
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

<script>
$(function() {

    $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
    });

    var tran_status = "";
    $('#get_all_trans').on('click',function(){
      tran_status = '';
      table.draw();
      $('.dataTables_filter').css('display','block');
    })

    $('#get_success_trans').on('click',function(){
      tran_status = 'SUCCESSFUL';
      table.draw();
      $('.dataTables_filter').css('display','none');
    })

    $('#get_fail_trans').on('click',function(){
      tran_status = 'FAIL';
      table.draw();
      $('.dataTables_filter').css('display','none');
    })

    $('#get_pending_trans').on('click',function(){
      tran_status = 'Pending';
      table.draw();
      $('.dataTables_filter').css('display','none');
    })

    $('#get_exception_trans').on('click',function(){
      tran_status = 'Exception';
      table.draw();
      $('.dataTables_filter').css('display','none');
    })

      $("#get_all_trans1").click(function() {
      $('#get_all_trans1').css({'background':'hsla(120,100%,75%,0.3)'});
      $('#get_success_trans1').css({'background':'white'});
      $('#get_fail_trans1').css({'background':'white'});
      $('#get_pending_trans1').css({'background':'white'});
      $('#get_exception_trans1').css({'background':'white'});
    });

      $("#get_success_trans1").click(function() {
      $('#get_success_trans1').css({'background':'hsla(120,100%,75%,0.3)'});
      $('#get_all_trans1').css({'background':'white'});
      $('#get_fail_trans1').css({'background':'white'});
      $('#get_pending_trans1').css({'background':'white'});
      $('#get_exception_trans1').css({'background':'white'});
    });

      $("#get_fail_trans1").click(function() {
      $('#get_fail_trans1').css({'background':'hsla(120,100%,75%,0.3)'});
      $('#get_all_trans1').css({'background':'white'});
      $('#get_success_trans1').css({'background':'white'});
      $('#get_pending_trans1').css({'background':'white'});
      $('#get_exception_trans1').css({'background':'white'});
    });

      $("#get_pending_trans1").click(function() {
      $('#get_pending_trans1').css({'background':'hsla(120,100%,75%,0.3)'});
      $('#get_all_trans1').css({'background':'white'});
      $('#get_success_trans1').css({'background':'white'});
      $('#get_fail_trans1').css({'background':'white'});
      $('#get_exception_trans1').css({'background':'white'});
    });



      $("#get_exception_trans1").click(function() {
      $('#get_exception_trans1').css({'background':'hsla(120,100%,75%,0.3)'});
      $('#get_all_trans1').css({'background':'white'});
      $('#get_success_trans1').css({'background':'white'});
      $('#get_fail_trans1').css({'background':'white'});
      $('#get_pending_trans1').css({'background':'white'});
    });

    $('#start').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        autoclose: true,
    });
    $('#end').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });

    var date = new Date();
    var today = date.getFullYear() + "-" + (date.getMonth()+1) +"-"+ date.getDate();

    $('#start').val(today);
    $('#end').val(today);


    var table = $('#transactionHistory-table').DataTable({
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: {
            url: '/transactionHistory',
            error: function(xhr, error){
                if (xhr.status === 401) {
                   window.location.href = '/login';
                }
            },
    
            data: function (d) {
                d.start_date = $('#start').val();
                d.end_date = $('#end').val();
                d.tran_status = tran_status;
                d.search = $('.dataTables_filter input').val();
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

    $('#submit').on('click', function() {
        getAllTran();
        getSuccessTran();
        getFailTran();
        getPendingTran();
        getExceptionTran();
        table.draw();
    });

});
</script>
<script>
  $(document).ready(function(){
    getAllTran();
    getSuccessTran();
    getFailTran();
    getPendingTran();
    getExceptionTran();
  })

  function getAllTran(){
    $.ajax({
      url: '/dashboard_trans_allTrans',
      type: 'GET',
      dataType: 'json',
      data: { 
        start_date : $('#start').val(),
        end_date : $('#end').val(),
      },
      success: function(data) {
        $('#all_transcount').text(data.all_transcount);
        
      }
    })
  }

  function getSuccessTran(){
    $.ajax({
      url: '/dashboard_trans_successTrans',
      type: 'GET',
      dataType: 'json',
      data: { 
        start_date : $('#start').val(),
        end_date : $('#end').val(),
      },
      success: function(data) {
        $('#success_trans').text(data.success_trans);
      }
    })
  }

  function getFailTran(){
    $.ajax({
      url: '/dashboard_trans_failTrans',
      type: 'GET',
      dataType: 'json',
      data: { 
        start_date : $('#start').val(),
        end_date : $('#end').val(),
      },
      success: function(data) {
        $('#fail_trans').text(data.fail_trans);
      }
    })
  }

  function getPendingTran(){
    $.ajax({
      url: '/dashboard_trans_pendingTrans',
      type: 'GET',
      dataType: 'json',
      data: { 
        start_date : $('#start').val(),
        end_date : $('#end').val(),
      },
      success: function(data) {
        $('#pending_trans').text(data.pending_trans);
      }
    })
  }

  function getExceptionTran(){
    $.ajax({
      url: '/dashboard_trans_exceptionTrans',
      type: 'GET',
      dataType: 'json',
      data: { 
        start_date : $('#start').val(),
        end_date : $('#end').val(),
      },
      success: function(data) {
        $('#exception_trans').text(data.exception_trans);
      }
    })
  }
</script>
@endsection