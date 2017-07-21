<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class operatorSaleController extends Controller
{
    public function __construct() 
    {
      $this->middleware('auth');
    }
    public function index()
    {
    	$todaydate = Date('Y-m-d');
    	$dayb4yesterday = date('Y-m-d', strtotime($todaydate .' -2 day'));  
      $yesterday = date('Y-m-d', strtotime($todaydate .' -1 day'));

        
       $result = DB::table('topup')
       		->select(DB::raw("SUM(topup_amount)"))
            ->where('operator', '=', 'MPT')
            ->where(function ($query) {
                $query->where('eload_status', '=', 'Success')
                      ->Orwhere('eload_status', '=', 'Using');
            })
            ->whereDate('topup_date','=',$dayb4yesterday)
            ->get();
            
		$mpt1 = $result[0]->sum;
    $mpt = number_format($mpt1);


		$result1 = DB::table('topup')
       		->select(DB::raw("SUM(topup_amount)"))
            ->where('operator', '=', 'Ooredoo')
            ->where(function ($query) {
                $query->where('eload_status', '=', 'Success')
                      ->Orwhere('eload_status', '=', 'Using');
            })
            ->whereDate('topup_date','=',$dayb4yesterday)
            ->get();

		$ooredoo1 = $result1[0]->sum;
    $ooredoo = number_format($ooredoo1);

    $result2 = DB::table('topup')
          ->select(DB::raw("SUM(topup_amount)"))
            ->where('operator', '=', 'MEC')
            ->where(function ($query) {
                $query->where('eload_status', '=', 'Success')
                      ->Orwhere('eload_status', '=', 'Using');
            })
            ->whereDate('topup_date','=',$dayb4yesterday)
            ->get();

    $mec1 = $result2[0]->sum;
    $mec = number_format($mec1);

    $result3 = DB::table('topup')
          ->select(DB::raw("SUM(topup_amount)"))
            ->where('operator', '=', 'Telenor')
            ->where(function ($query) {
                $query->where('eload_status', '=', 'Success')
                      ->Orwhere('eload_status', '=', 'Using');
            })
            ->whereDate('topup_date','=',$dayb4yesterday)
            ->get();

    $telenor1 = $result3[0]->sum;
    $telenor = number_format($telenor1);

    $resultYes = DB::table('topup')
          ->select(DB::raw("SUM(topup_amount)"))
            ->where('operator', '=', 'MPT')
            ->where(function ($query) {
                $query->where('eload_status', '=', 'Success')
                      ->Orwhere('eload_status', '=', 'Using');
            })
            ->whereDate('topup_date','=',$yesterday)
            ->get();

    $mptYes1 = $resultYes[0]->sum;
    $mptYes = number_format($mptYes1);

    $resultYes1 = DB::table('topup')
          ->select(DB::raw("SUM(topup_amount)"))
            ->where('operator', '=', 'Ooredoo')
            ->where(function ($query) {
                $query->where('eload_status', '=', 'Success')
                      ->Orwhere('eload_status', '=', 'Using');
            })
            ->whereDate('topup_date','=',$yesterday)
            ->get();

    $ooredooYes1 = $resultYes1[0]->sum;
    $ooredooYes = number_format($ooredooYes1);

    $resultYes2 = DB::table('topup')
          ->select(DB::raw("SUM(topup_amount)"))
            ->where('operator', '=', 'MEC')
            ->where(function ($query) {
                $query->where('eload_status', '=', 'Success')
                      ->Orwhere('eload_status', '=', 'Using');
            })
            ->whereDate('topup_date','=',$yesterday)
            ->get();

    $mecYes1 = $resultYes2[0]->sum;
    $mecYes = number_format($mecYes1);


    $resultYes3 = DB::table('topup')
          ->select(DB::raw("SUM(topup_amount)"))
            ->where('operator', '=', 'Telenor')
            ->where(function ($query) {
                $query->where('eload_status', '=', 'Success')
                      ->Orwhere('eload_status', '=', 'Using');
            })
            ->whereDate('topup_date','=',$yesterday)
            ->get();

    $telenorYes1 = $resultYes3[0]->sum;
    $telenorYes = number_format($telenorYes1);



    $resultToday = DB::table('topup')
          ->select(DB::raw("SUM(topup_amount)"))
            ->where('operator', '=', 'MPT')
            ->where(function ($query) {
                $query->where('eload_status', '=', 'Success')
                      ->Orwhere('eload_status', '=', 'Using');
            })
            ->whereDate('topup_date','=',$todaydate)
            ->get();

    $mptToday1 = $resultToday[0]->sum;
    $mptToday = number_format($mptToday1);

    $resultToday1 = DB::table('topup')
          ->select(DB::raw("SUM(topup_amount)"))
            ->where('operator', '=', 'Ooredoo')
            ->where(function ($query) {
                $query->where('eload_status', '=', 'Success')
                      ->Orwhere('eload_status', '=', 'Using');
            })
            ->whereDate('topup_date','=',$todaydate)
            ->get();

    $ooredooToday1 = $resultToday1[0]->sum;
    $ooredooToday = number_format($ooredooToday1);

    $resultToday2 = DB::table('topup')
          ->select(DB::raw("SUM(topup_amount)"))
            ->where('operator', '=', 'MEC')
            ->where(function ($query) {
                $query->where('eload_status', '=', 'Success')
                      ->Orwhere('eload_status', '=', 'Using');
            })
            ->whereDate('topup_date','=',$todaydate)
            ->get();

    $mecToday1 = $resultToday2[0]->sum;
    $mecToday = number_format($mecToday1);



    $resultToday3 = DB::table('topup')
          ->select(DB::raw("SUM(topup_amount)"))
            ->where('operator', '=', 'Telenor')
            ->where(function ($query) {
                $query->where('eload_status', '=', 'Success')
                      ->Orwhere('eload_status', '=', 'Using');
            })
            ->whereDate('topup_date','=',$todaydate)
            ->get();

    $telenorToday1 = $resultToday3[0]->sum;
    $telenorToday = number_format($telenorToday1);


		


        $user = Session('user');
         
       return view('backend.operatorsale.index', array(  
           'user' => $user,
           'mpt' => $mpt,
           'ooredoo' => $ooredoo,
           'mec' => $mec,
           'telenor' => $telenor,
           'mptYes' => $mptYes,
           'ooredooYes' => $ooredooYes,
           'mecYes' => $mecYes,
           'telenorYes' => $telenorYes,
           'mptToday' => $mptToday,
           'ooredooToday' => $ooredooToday,
           'mecToday' => $mecToday,
           'telenorToday' => $telenorToday,
       ));

    }
}
