<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class allCallController extends Controller
{
	public function __construct() 
    {
      $this->middleware('auth');
    }
    public function index()
    {
        
    	$user = Session('user');
        $today = DB::select("select sum(case when complain_status='Pending' 
                            then 1 else 0 end) as open_ticket, 
                            sum(case when complain_status='Done' then 1 else 0 end) as close_ticket
                            from complain_transaction 
                            where date(complain_date) =DATE(NOW())");
        $todayResult = [];
        foreach ($today as $today) {
            array_push($todayResult, $today->open_ticket);
            array_push($todayResult, $today->close_ticket);
        }
        // dd($testResult);

        $yesterday = DB::select("select sum(case when complain_status='Pending' then 1 else 0 end) as open_ticket, sum(case when complain_status='Done' then 1 else 0 end) as close_ticket
                            from complain_transaction 
                            where date(complain_date) =DATE(NOW())-1");
        $yesterdayResult = [];
        foreach ($yesterday as $yesterday) {
            array_push($yesterdayResult, $yesterday->open_ticket);
            array_push($yesterdayResult, $yesterday->close_ticket);
        }

        $dayAfter = DB::select("select sum(case when complain_status='Pending' then 1 else 0 end) as open_ticket, sum(case when complain_status='Done' then 1 else 0 end) as close_ticket
                            from complain_transaction 
                            where date(complain_date) =DATE(NOW())-2");
        $dayAfterResult = [];
        foreach ($dayAfter as $dayAfter) {
            array_push($dayAfterResult, $dayAfter->open_ticket);
            array_push($dayAfterResult, $dayAfter->close_ticket);
        }

    	return view('backend.allcall.index', array(   
          'user' => $user,
          'todayResult' => $todayResult,
          'yesterdayResult' => $yesterdayResult,
          'dayAfterResult' => $dayAfterResult,
        ));
    }
}
