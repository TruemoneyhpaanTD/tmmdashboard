<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class eloadController extends Controller
{
    public function __construct() 
    {
      $this->middleware('auth');
    }
    public function index()
    {
        
    	$user = Session('user');
        $today = DB::select("select sum(case when complain_status='Pending' then 1 else 0 end) as open_ticket, sum(case when complain_status='Done' then 1 else 0 end) as close_ticket
					from complain_transaction
					where services='MPT' and date(complain_date) =DATE(NOW())");

        $todayResult = [];
        foreach ($today as $today) {
            array_push($todayResult, $today->open_ticket);
            array_push($todayResult, $today->close_ticket);
        }
        // dd($testResult);

        $yesterday = DB::select("select sum(case when complain_status='Pending' then 1 else 0 end) as open_ticket, sum(case when complain_status='Done' then 1 else 0 end) as close_ticket
						from complain_transaction
						where services='MPT' and date(complain_date) =DATE(NOW())-1");

        $yesterdayResult = [];
        foreach ($yesterday as $yesterday) {
            array_push($yesterdayResult, $yesterday->open_ticket);
            array_push($yesterdayResult, $yesterday->close_ticket);
        }

        $dayAfter = DB::select("select sum(case when complain_status='Pending' then 1 else 0 end) as open_ticket, sum(case when complain_status='Done' then 1 else 0 end) as close_ticket
						from complain_transaction
						where services='MPT' and date(complain_date) =DATE(NOW())-2");
        $dayAfterResult = [];
        foreach ($dayAfter as $dayAfter) {
            array_push($dayAfterResult, $dayAfter->open_ticket);
            array_push($dayAfterResult, $dayAfter->close_ticket);
        }


        $todayOoredoo = DB::select("select sum(case when complain_status='Pending' then 1 else 0 end) as open_ticket, sum(case when complain_status='Done' then 1 else 0 end) as close_ticket
					from complain_transaction
					where services='Ooredoo' and date(complain_date) =DATE(NOW())");

        $todayOResult = [];
        foreach ($todayOoredoo as $todayOoredoo) {
            array_push($todayOResult, $todayOoredoo->open_ticket);
            array_push($todayOResult, $todayOoredoo->close_ticket);
        }
        

        $yesterdayOore = DB::select("select sum(case when complain_status='Pending' then 1 else 0 end) as open_ticket, sum(case when complain_status='Done' then 1 else 0 end) as close_ticket
						from complain_transaction
						where services='Ooredoo' and date(complain_date) =DATE(NOW())-1");

        $yesterdayOResult = [];
        foreach ($yesterdayOore as $yesterdayOore) {
            array_push($yesterdayOResult, $yesterdayOore->open_ticket);
            array_push($yesterdayOResult, $yesterdayOore->close_ticket);
        }

        $dayOAfter = DB::select("select sum(case when complain_status='Pending' then 1 else 0 end) as open_ticket, sum(case when complain_status='Done' then 1 else 0 end) as close_ticket
						from complain_transaction
						where services='Ooredoo' and date(complain_date) =DATE(NOW())-2");
       
        $dayAfterOResult = [];
        foreach ($dayOAfter as $dayOAfter) {
            array_push($dayAfterOResult, $dayOAfter->open_ticket);
            array_push($dayAfterOResult, $dayOAfter->close_ticket);
        }
        // dd($dayAfterOResult);
        $mectoday = DB::select("select sum(case when complain_status='Pending' then 1 else 0 end) as open_ticket, sum(case when complain_status='Done' then 1 else 0 end) as close_ticket
					from complain_transaction
					where services='MEC' and date(complain_date) =DATE(NOW())");

        $todaymecResult = [];
        foreach ($mectoday as $mectoday) {
            array_push($todaymecResult, $mectoday->open_ticket);
            array_push($todaymecResult, $mectoday->close_ticket);
        }
        // dd($testResult);

        $mecyesterday = DB::select("select sum(case when complain_status='Pending' then 1 else 0 end) as open_ticket, sum(case when complain_status='Done' then 1 else 0 end) as close_ticket
						from complain_transaction
						where services='MEC' and date(complain_date) =DATE(NOW())-1");

        $mecyesterdayResult = [];
        foreach ($mecyesterday as $mecyesterday) {
            array_push($mecyesterdayResult, $mecyesterday->open_ticket);
            array_push($mecyesterdayResult, $mecyesterday->close_ticket);
        }

        $mecdayAfter = DB::select("select sum(case when complain_status='Pending' then 1 else 0 end) as open_ticket, sum(case when complain_status='Done' then 1 else 0 end) as close_ticket
						from complain_transaction
						where services='MEC' and date(complain_date) =DATE(NOW())-2");
        $mecdayAfterResult = [];
        foreach ($mecdayAfter as $mecdayAfter) {
            array_push($mecdayAfterResult, $mecdayAfter->open_ticket);
            array_push($mecdayAfterResult, $mecdayAfter->close_ticket);
        }


        $teletoday = DB::select("select sum(case when complain_status='Pending' then 1 else 0 end) as open_ticket, sum(case when complain_status='Done' then 1 else 0 end) as close_ticket
					from complain_transaction
					where services='Telenor' and date(complain_date) =DATE(NOW())");

        $teletodayResult = [];
        foreach ($teletoday as $teletoday) {
            array_push($teletodayResult, $teletoday->open_ticket);
            array_push($teletodayResult, $teletoday->close_ticket);
        }
        // dd($testResult);

        $teleyesterday = DB::select("select sum(case when complain_status='Pending' then 1 else 0 end) as open_ticket, sum(case when complain_status='Done' then 1 else 0 end) as close_ticket
						from complain_transaction
						where services='Telenor' and date(complain_date) =DATE(NOW())-1");

        $teleyesterdayResult = [];
        foreach ($teleyesterday as $teleyesterday) {
            array_push($teleyesterdayResult, $teleyesterday->open_ticket);
            array_push($teleyesterdayResult, $teleyesterday->close_ticket);
        }

        $teledayAfter = DB::select("select sum(case when complain_status='Pending' then 1 else 0 end) as open_ticket, sum(case when complain_status='Done' then 1 else 0 end) as close_ticket
						from complain_transaction
						where services='Telenor' and date(complain_date) =DATE(NOW())-2");
        $teledayAfterResult = [];
        foreach ($teledayAfter as $teledayAfter) {
            array_push($teledayAfterResult, $teledayAfter->open_ticket);
            array_push($teledayAfterResult, $teledayAfter->close_ticket);
        }


    	return view('backend.eload.index', array(   
          'user' => $user,
          'todayResult' => $todayResult,
          'yesterdayResult' => $yesterdayResult,
          'dayAfterResult' => $dayAfterResult,
          'todayOResult' => $todayOResult,
          'yesterdayOResult' => $yesterdayOResult,
          'dayAfterOResult' => $dayAfterOResult,
          'todaymecResult' => $todaymecResult,
          'mecyesterdayResult' => $mecyesterdayResult,
          'mecdayAfterResult' => $mecdayAfterResult,
          'teletodayResult' => $teletodayResult,
          'teleyesterdayResult' => $teleyesterdayResult,
          'teledayAfterResult' => $teledayAfterResult,

        ));
    }
}
