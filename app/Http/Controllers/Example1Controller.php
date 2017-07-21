<?php

namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Example1Controller extends Controller
{
    public function __construct() 
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $today = Date('Y-m-d');


      $mon = DB::table('agentcard')
            ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
            ->leftjoin('agentcontract','agentcontract.agentcard_ref','=','agentcard.agentcard_ref')
            ->leftjoin('users','users.users_id','=','agent.user_id')
            ->where('agentcontract.status','=','Active')
            ->where('users.province','=','Mon')
            ->groupBy('users.province')
            ->distinct('u.province')
            ->count();

      $bago_west = DB::table('agentcard')
            ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
            ->leftjoin('agentcontract','agentcontract.agentcard_ref','=','agentcard.agentcard_ref')
            ->leftjoin('users','users.users_id','=','agent.user_id')
            ->where('agentcontract.status','=','Active')
            ->where('users.province','=','Bago West')
            ->groupBy('users.province')
            ->distinct('u.province')
            ->count();

      $Rakhine = DB::table('agentcard')
            ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
            ->leftjoin('agentcontract','agentcontract.agentcard_ref','=','agentcard.agentcard_ref')
            ->leftjoin('users','users.users_id','=','agent.user_id')
            ->where('agentcontract.status','=','Active')
            ->where('users.province','=','Rakhine')
            ->groupBy('users.province')
            ->distinct('u.province')
            ->count();
      
      $Tanintharyi = DB::table('agentcard')
            ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
            ->leftjoin('agentcontract','agentcontract.agentcard_ref','=','agentcard.agentcard_ref')
            ->leftjoin('users','users.users_id','=','agent.user_id')
            ->where('agentcontract.status','=','Active')
            ->where('users.province','=','Tanintharyi')
            ->groupBy('users.province')
            ->distinct('u.province')
            ->count();

      $NayPyiTaw = DB::table('agentcard')
            ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
            ->leftjoin('agentcontract','agentcontract.agentcard_ref','=','agentcard.agentcard_ref')
            ->leftjoin('users','users.users_id','=','agent.user_id')
            ->where('agentcontract.status','=','Active')
            ->where('users.province','=','Nay Pyi Taw')
            ->groupBy('users.province')
            ->distinct('u.province')
            ->count();

      $Kachin = DB::table('agentcard')
            ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
            ->leftjoin('agentcontract','agentcontract.agentcard_ref','=','agentcard.agentcard_ref')
            ->leftjoin('users','users.users_id','=','agent.user_id')
            ->where('agentcontract.status','=','Active')
            ->where('users.province','=','Kachin')
            ->groupBy('users.province')
            ->distinct('u.province')
            ->count();

      $Mandalay = DB::table('agentcard')
            ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
            ->leftjoin('agentcontract','agentcontract.agentcard_ref','=','agentcard.agentcard_ref')
            ->leftjoin('users','users.users_id','=','agent.user_id')
            ->where('agentcontract.status','=','Active')
            ->where('users.province','=','Mandalay')
            ->groupBy('users.province')
            ->distinct('u.province')
            ->count();

      $Ayeyarwady = DB::table('agentcard')
            ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
            ->leftjoin('agentcontract','agentcontract.agentcard_ref','=','agentcard.agentcard_ref')
            ->leftjoin('users','users.users_id','=','agent.user_id')
            ->where('agentcontract.status','=','Active')
            ->where('users.province','=','Ayeyarwady')
            ->groupBy('users.province')
            ->distinct('u.province')
            ->count();


      $shan_south = DB::table('agentcard')
            ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
            ->leftjoin('agentcontract','agentcontract.agentcard_ref','=','agentcard.agentcard_ref')
            ->leftjoin('users','users.users_id','=','agent.user_id')
            ->where('agentcontract.status','=','Active')
            ->where('users.province','=','Shan State (South)')
            ->groupBy('users.province')
            ->distinct('u.province')
            ->count();

      $Yangon = DB::table('agentcard')
            ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
            ->leftjoin('agentcontract','agentcontract.agentcard_ref','=','agentcard.agentcard_ref')
            ->leftjoin('users','users.users_id','=','agent.user_id')
            ->where('agentcontract.status','=','Active')
            ->where('users.province','=','Yangon')
            ->groupBy('users.province')
            ->distinct('u.province')
            ->count();

      $Kayah = DB::table('agentcard')
            ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
            ->leftjoin('agentcontract','agentcontract.agentcard_ref','=','agentcard.agentcard_ref')
            ->leftjoin('users','users.users_id','=','agent.user_id')
            ->where('agentcontract.status','=','Active')
            ->where('users.province','=','Kayah')
            ->groupBy('users.province')
            ->distinct('u.province')
            ->count();

      $shan_north = DB::table('agentcard')
            ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
            ->leftjoin('agentcontract','agentcontract.agentcard_ref','=','agentcard.agentcard_ref')
            ->leftjoin('users','users.users_id','=','agent.user_id')
            ->where('agentcontract.status','=','Active')
            ->where('users.province','=','Shan State (North)')
            ->groupBy('users.province')
            ->distinct('u.province')
            ->count();

      $kayin = DB::table('agentcard')
            ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
            ->leftjoin('agentcontract','agentcontract.agentcard_ref','=','agentcard.agentcard_ref')
            ->leftjoin('users','users.users_id','=','agent.user_id')
            ->where('agentcontract.status','=','Active')
            ->where('users.province','=','Kayin')
            ->groupBy('users.province')
            ->distinct('u.province')
            ->count();

      $magway = DB::table('agentcard')
            ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
            ->leftjoin('agentcontract','agentcontract.agentcard_ref','=','agentcard.agentcard_ref')
            ->leftjoin('users','users.users_id','=','agent.user_id')
            ->where('agentcontract.status','=','Active')
            ->where('users.province','=','Magway')
            ->groupBy('users.province')
            ->distinct('u.province')
            ->count();

      $sagaing = DB::table('agentcard')
            ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
            ->leftjoin('agentcontract','agentcontract.agentcard_ref','=','agentcard.agentcard_ref')
            ->leftjoin('users','users.users_id','=','agent.user_id')
            ->where('agentcontract.status','=','Active')
            ->where('users.province','=','Sagaing')
            ->groupBy('users.province')
            ->distinct('u.province')
            ->count();

      $bago_east = DB::table('agentcard')
            ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
            ->leftjoin('agentcontract','agentcontract.agentcard_ref','=','agentcard.agentcard_ref')
            ->leftjoin('users','users.users_id','=','agent.user_id')
            ->where('agentcontract.status','=','Active')
            ->where('users.province','=','Bago East')
            ->groupBy('users.province')
            ->distinct('u.province')
            ->count();

      $agentTotal1 = DB::table('agentcard')
            ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
            ->leftjoin('agentcontract','agentcontract.agentcard_ref','=','agentcard.agentcard_ref')
            ->where('agentcontract.status','=','Active')
            ->count('agentcard.agentcard_ref');

      $agentTotal = number_format($agentTotal1);


      $totalTran1 = DB::table('transactionlog')
            ->whereDate('transactionlog_datetime', '>', '2016-01-01')
            ->whereDate('transactionlog_datetime', '<', $today)
            ->where('transaction_status','=','SUCCESSFUL')
            ->count('transactionlog_id');
        // dd($totalTran);

      $totalTran = number_format($totalTran1);


    	$user = Session('user');
    	return view('backend.example1.index', array(   
          'user' => $user,
          'mon' => $mon,
          'bago_west' => $bago_west,
          'Rakhine' => $Rakhine,
          'Tanintharyi' => $Tanintharyi,
          'NayPyiTaw' => $NayPyiTaw,
          'Kachin' => $Kachin,
          'Mandalay' => $Mandalay,
          'Ayeyarwady' => $Ayeyarwady,
          'shan_south' => $shan_south,
          'Yangon' => $Yangon,
          'Kayah' => $Kayah,
          'shan_north' => $shan_north,
          'kayin' => $kayin,
          'magway' => $magway,
          'sagaing' => $sagaing,
          'bago_east' => $bago_east,
          'agentTotal' => $agentTotal,
          'totalTran' => $totalTran,
         
           // 'mec_10000'  => $mec_10000,
        ));
    }
}
