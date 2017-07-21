<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use App\Users;
class ProfileController extends Controller
{
  public function __construct() 
  {
    $this->middleware('auth');
  }

  public function getprofile()
  {
    $editdata = DB::table('users')
              ->leftjoin('agent','agent.user_id','=','users.users_id')
              ->leftjoin('agentcard','agentcard.agent_id','=','agent.agent_id')
              ->leftjoin('transactionlog','transactionlog.agent_card_ref','=','agentcard.agentcard_ref')
              ->where('agentcard.factory_cardno','=',Auth::user()->factory_cardno)
              ->select('users.user_name As agent_name','agent.job_ref As short_name','agentcard.factory_cardno As AgentCard','users.address as address','users.township as township','users.mobileno1 as phone_no','users.user_nrc as nrc','agentcard.balance_amount as balance_amount','users.location','transactionlog.terminal_ref as Terminal')
              ->first();

     // dd($editdata);
    
    if (!$editdata->location) {
      $editdata->location = "0 0";
    }
    
     $user = DB::table('trueemployee')
                ->where('trueemployee.trueemployee_id',Auth::user()->trueemployee_id)
                ->first();

    return view('backend.profile.list', array(
      'editdata' => $editdata,
      'user' => $user
    ));   
  }

}
