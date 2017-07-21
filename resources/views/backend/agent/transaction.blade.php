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
                          <table class="table table-striped table-bordered " cellspacing="0" width="100%" id="transactionHistory-table">
                             <thead>
                                 <tr>
                                     <th>Transaction Date</th> 
                                     <th>Description</th> 
                                     <th>MobileNumber</th> 
                                     <th>PreBalance</th> 
                                     <th>PostBalance</th>
                                     <th>Amount</th>
                                     <th>Commission</th>
                                     <th>Status</th>
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

     // var factory_cardno = '';
     // $('.factory_cardno').on('click',function(e){
     //   factory_cardno = $(e.relatedTarget).data('fcno');
     // })
    var url = window.location.pathname;
    var arr = url.split("/");
    var factory_cardno = arr[2];

    var table = $('#transactionHistory-table').DataTable({
    
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: {
            // url: '/agent/factory_cardno/transaction',
             url: '/agent/'+factory_cardno+'/transaction',
             error: function(xhr, error){
               if (xhr.status === 401) {
                 window.location.href = '/admin/login';
               }
             },
    
            data: function (d) {
                d.start_date = $('#start').val();
                d.end_date = $('#end').val();
                // d.search = $('.dataTables_filter input').val();

            },
        },

        columns: [
             {data: 'TransactionDate', name: 'transactionlog.transactionlog_datetime'},
            {data: 'activities', name: 'activities.activities'},
            {data: 'TopupMobile', name: 'topup.phone_no'},
            {data: 'prebalance', name: 'transactionlog.pre_agent_card_balance'},
            {data: 'postbalance', name: 'transactionlog.agent_card_balance'},
            {data: 'saleamount', name: 'transactionlog.amount'},
            {data: 'agentcommission', name: 'agent_commission.commission'},
            {data: 'Status', name: 'transactionlog.transaction_status'},
        ],


        order: [ 
         
              [0, 'desc'],
    
        ],
    });



    $('#submit').on('click', function() {
        table.draw();
    });

});
</script>
@endsection