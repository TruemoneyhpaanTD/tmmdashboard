@extends('layouts.app')

@section('css')
   <link href="/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
   <!-- Datatables -->
   <link href="/libs/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
   <link href="/libs/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
   <link href="/libs/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
   <link href="/libs/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
   <link href="/libs/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
   <link href="/libs/gentelella/css/custom.min.css" rel="stylesheet">
   

@endsection

@section('content')
<!-- page content -->
   <div class="right_col" role="main">
      <div class="">
         <div class="page-title">
              <div class="title_left">
                
              </div>
         </div>
         <div class="row">
            
            <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                  <div class="x_title form-horizontal">
                    
                    <div class="clearfix"></div>
                    <div class="form-group">
                     
                      <label class="col-md-1 control-label">Card No</label>
                      <div class="col-md-3">
                        {{-- <label class="col-md-1 control-label">Gender</label> --}}
                        <input type="text" class="form-control" name="cardNo" id="cardNo"> 
                      </div>
                    

                      <label class="col-md-2 control-label">Terminal</label>
                      <div class="col-md-3">
                        <input type="text" class="form-control" name="terminal" id="terminal"> 
                      </div>

                      <div class="col-md-2">
                        <button id="submit" class="btn btn-success pull-right"> Search</button>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div> 
                

                  <div class="x_content">                     
                        <div class="table-responsive">
                         <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="users-table">
                           <thead>
                               <tr> 
                                   <th> Shop Name </th>
                                   <th> Township </th>
                                   <th> Agent Type </th>
                                   <th> Card No </th>
                                   <th> Terminal </th>
                                   <th> Version </th>
                                   <th> Balance </th>
                                   <th> Sim </th>
                                   <th> Expire Date </th>
                                   <th> Last Balance</th>
                                   <th> Action </th>
                               </tr>
                           </thead>
                         </table>
                        </div>
                     <!-- /.table-responsive -->
                  </div>
                </div>
            </div>

         </div>
      </div>  
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
$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



    var oTable = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/agent',
             data: function (d) {
                d.cardNo = $('#cardNo').val();
                d.terminal = $('#terminal').val();
            },
             error: function(xhr, error){
                  if (xhr.status === 401) {
                    window.location.href = '/login';
                  }else{
                    alert(error);
                  }
                },

        },
        columns: [
            {data: 'shop_name', name: 'agent.job_ref'},
            {data: 'township', name: 'users.township'},
            {data: 'agent_type', name: 'agent_type.description'},
            {data: 'factory_cardno', name: 'agentcard.factory_cardno'},
            {data: 'terminal_ref', name: 'agentcontract.terminal_ref'},
            {data: 'version', name: 'terminal.app_version'},
            {data: 'balance', name: 'agentcard.balance_amount'},
            {data: 'sim', name: 'sim.phone_no'},
            {data: 'expire_date', name: 'sim.expire_date'},
            {data: 'last_balance', name: 'sim.last_balance'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });

        $('#submit').on('click', function() {
            oTable.draw();
         });

        $('#cardNo,#terminal').on('keyup',function(){
          if ($(this).val().length <= 0) {
             oTable.draw();
          }
        })

})
      
</script>
@endsection