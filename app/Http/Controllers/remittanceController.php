<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class remittanceController extends Controller
{
    public function __construct() 
    {
      $this->middleware('auth');
    }
    public function index()
    {

    	$user = Session('user');
        $remiToday = DB::select("select sum(case when complain_status='Pending' then 1 else 0 end) as open_ticket, sum(case when complain_status='Done' then 1 else 0 end) as close_ticket
                        from complain_transaction
                        where service_type='Remittance' and date(complain_date)= DATE(NOW())");
         // dd($remiToday);
         $remitodayResult = [];
      	foreach ($remiToday as $remiToday) {
            array_push($remitodayResult, $remiToday->open_ticket);
            array_push($remitodayResult, $remiToday->close_ticket);
        }
       //  foreach ($remiToday as $remiToday) {
           
       //     if($remiToday->open_ticket = " " || $remiToday->open_ticket = null){
               
       //        $open_ticket = 0;
       //        // dd($open_ticket);
       //     }
       //     elseif($remiToday->open_ticket != "" || $remiToday->open_ticket != null){
               
       //         $open_ticket = $remiToday->open_ticket;
       //     }
       //    	array_push($remitodayResult, $open_ticket);
         
       //     if($remiToday->close_ticket = " " || $remiToday->close_ticket = null){
               
       //        $close_ticket = 0;
       //     }
       //     elseif($remiToday->close_ticket != "" || $remiToday->close_ticket != null){
       //         $close_ticket = $remiToday->close_ticket;
       //     }
       
          
        
       //     array_push($remitodayResult, $close_ticket);
       // }
        // dd($remitodayResult);

        $remiyesterday = DB::select("select sum(case when complain_status='Pending' then 1 else 0 end) as open_ticket, sum(case when complain_status='Done' then 1 else 0 end) as close_ticket
						from complain_transaction
						where service_type='Remittance' and date(complain_date)= DATE(NOW())-1");
        $remiyesterdayResult = [];
        foreach ($remiyesterday as $remiyesterday) {
            array_push($remiyesterdayResult, $remiyesterday->open_ticket);
            array_push($remiyesterdayResult, $remiyesterday->close_ticket);
        }

        $remidayAfter = DB::select("select sum(case when complain_status='Pending' then 1 else 0 end) as open_ticket, sum(case when complain_status='Done' then 1 else 0 end) as close_ticket
						from complain_transaction
						where service_type='Remittance' and date(complain_date)= DATE(NOW())-2");
        $remidayAfterResult = [];
        foreach ($remidayAfter as $remidayAfter) {
            array_push($remidayAfterResult, $remidayAfter->open_ticket);
            array_push($remidayAfterResult, $remidayAfter->close_ticket);
        }


        $billPayToday = DB::select("select sum(case when complain_status='Pending' then 1 else 0 end) as open_ticket, sum(case when complain_status='Done' then 1 else 0 end) as close_ticket
						from complain_transaction
						where service_type='Bill Payment' and date(complain_date)= DATE(NOW())");
        $billPaytodayResult = [];
        foreach ($billPayToday as $billPayToday) {
            array_push($billPaytodayResult, $billPayToday->open_ticket);
            array_push($billPaytodayResult, $billPayToday->close_ticket);
        }
        // dd($testResult);

        $billpayyesterday = DB::select("select sum(case when complain_status='Pending' then 1 else 0 end) as open_ticket, sum(case when complain_status='Done' then 1 else 0 end) as close_ticket
						from complain_transaction
						where service_type='Bill Payment' and date(complain_date)= DATE(NOW())-1");
        $billpayyesterdayResult = [];
        foreach ($billpayyesterday as $billpayyesterday) {
            array_push($billpayyesterdayResult, $billpayyesterday->open_ticket);
            array_push($billpayyesterdayResult, $billpayyesterday->close_ticket);
        }

        $billPaydayAfter = DB::select("select sum(case when complain_status='Pending' then 1 else 0 end) as open_ticket, sum(case when complain_status='Done' then 1 else 0 end) as close_ticket
						from complain_transaction
						where service_type='Bill Payment' and date(complain_date)= DATE(NOW())-2");
        $billPaydayAfterResult = [];
        foreach ($billPaydayAfter as $billPaydayAfter) {
            array_push($billPaydayAfterResult, $billPaydayAfter->open_ticket);
            array_push($billPaydayAfterResult, $billPaydayAfter->close_ticket);
        }

    	return view('backend.remittance.index', array(   
          'user' => $user,
          'remitodayResult' => $remitodayResult,
          'remiyesterdayResult' => $remiyesterdayResult,
          'remidayAfterResult' => $remidayAfterResult,
          'billPaytodayResult' => $billPaytodayResult,
          'billpayyesterdayResult' => $billpayyesterdayResult,
          'billPaydayAfterResult' => $billPaydayAfterResult,
        ));
    }
}
