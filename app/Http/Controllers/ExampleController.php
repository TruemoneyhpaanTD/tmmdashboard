<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function __construct() 
    {
      $this->middleware('auth');
    }


    public function index()
   {
       $data = [];

       $todaydate = Date('Y-m-d');

       $sevenday_ago = date('Y-m-d', strtotime($todaydate .' -6 day'));

       $sixday_ago = date('Y-m-d', strtotime($todaydate .' -5 day'));
             
       $fiveday_ago = date('Y-m-d', strtotime($todaydate .' -4 day'));
             
       $fourday_ago = date('Y-m-d', strtotime($todaydate .' -3day'));
             
       $threeday_ago = date('Y-m-d', strtotime($todaydate .' -2 day'));
             
       $twoday_ago = date('Y-m-d', strtotime($todaydate .' -1 day'));
             
       $oneday_ago =$todaydate;
       // dd($sevenday_ago);

       $count = [];
       // $arrayName = array('MPT%', 'Tel%', 'Ord%', 'MEC%','Aeon%','Bnf%','HelloCabs%','CnP%','Titan%','TicketBo%','NT2NT','NT2T','T2NT','T2T','TcashOut','IRS%');
       
       $Tran_sql1 = DB::table('transactionlog')
                        ->where('transaction_status','=','SUCCESSFUL')
                        ->whereDate('transactionlog_datetime','=',$sevenday_ago)
                        // ->whereIn('activities_ref',array('MPT%', 'Tel%', 'Ord%', 'MEC%','Aeon%','Bnf%','HelloCabs%','CnP%','Titan%','TicketBo%','NT2NT','NT2T','T2NT','T2T','TcashOut','IRS%'))
                        ->count('transactionlog_id');


        $Tran_sql2 = DB::table('transactionlog')
                        ->where('transaction_status','=','SUCCESSFUL')
                        ->whereDate('transactionlog_datetime','=',$sixday_ago)
                        ->count('transactionlog_id');
                        // dd($Tran_sql2);

        $Tran_sql3 = DB::table('transactionlog')
                        ->where('transaction_status','=','SUCCESSFUL')
                        // ->whereIn('activities_ref', array('MPT%', 'Tel%', 'Ord%', 'MEC%','Aeon%','Bnf%','HelloCabs%','CnP%','Titan%','TicketBo%','NT2NT','NT2T','T2NT','T2T','TcashOut','IRS%'))
                        ->whereDate('transactionlog_datetime','=',$fiveday_ago)
                        ->count('transactionlog_id');
        // dd($Tran_sql3);

        $Tran_sql4 = DB::table('transactionlog')
                        ->where('transaction_status','=','SUCCESSFUL')
                        ->whereDate('transactionlog_datetime','=',$fourday_ago)
                        // ->whereNotIn('activities_ref',array('MPT%', 'Tel%', 'Ord%', 'MEC%','Aeon%','Bnf%','HelloCabs%','CnP%','Titan%','TicketBo%','NT2NT','NT2T','T2NT','T2T','TcashOut','IRS%'))
                        ->count('transactionlog_id');

        $Tran_sql5 = DB::table('transactionlog')
                        ->where('transaction_status','=','SUCCESSFUL')
                        ->whereDate('transactionlog_datetime','=',$threeday_ago)
                        // ->whereNotIn('activities_ref',array('MPT%', 'Tel%', 'Ord%', 'MEC%','Aeon%','Bnf%','HelloCabs%','CnP%','Titan%','TicketBo%','NT2NT','NT2T','T2NT','T2T','TcashOut','IRS%'))
                        ->count('transactionlog_id');



        $Tran_sql6 = DB::table('transactionlog')
                        ->where('transaction_status','=','SUCCESSFUL')
                        ->whereDate('transactionlog_datetime','=',$twoday_ago)
                        // ->whereNotIn('activities_ref',array('MPT%', 'Tel%', 'Ord%', 'MEC%','Aeon%','Bnf%','HelloCabs%','CnP%','Titan%','TicketBo%','NT2NT','NT2T','T2NT','T2T','TcashOut','IRS%'))
                        ->count('transactionlog_id');

        $Tran_sql7 = DB::table('transactionlog')
                        ->where('transaction_status','=','SUCCESSFUL')
                        ->whereDate('transactionlog_datetime','=',$oneday_ago)
                        // ->whereNotIn('activities_ref',array('MPT%', 'Tel%', 'Ord%', 'MEC%','Aeon%','Bnf%','HelloCabs%','CnP%','Titan%','TicketBo%','NT2NT','NT2T','T2NT','T2T','TcashOut','IRS%'))
                        ->count('transactionlog_id');
          
 // dd($Tran_sql6);
       array_push($data,$sevenday_ago,$sixday_ago,$fiveday_ago,$fourday_ago,$threeday_ago,$twoday_ago,$oneday_ago);
       array_push($count,$Tran_sql1,$Tran_sql2,$Tran_sql3,$Tran_sql4,$Tran_sql5,$Tran_sql6,$Tran_sql7);

       $user = Session('user');
         
       return view('backend.example.index', array(  
           'user' => $user,
           'data' => $data,
           'count' => $count
       ));
   }
}
