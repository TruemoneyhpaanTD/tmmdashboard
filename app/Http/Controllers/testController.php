<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class testController extends Controller
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
                            where date(modified_date) =DATE(NOW())");
        // dd($today);
        $todayResult = [];
        foreach ($today as $today) {
            array_push($todayResult, $today->open_ticket);
            array_push($todayResult, $today->close_ticket);
        }
        // dd($testResult);

        
    	return view('backend.test.index', array(   
          'user' => $user,
          'todayResult' => $todayResult,
          
        ));
    }
}
