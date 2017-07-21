<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use DB;
use Auth;
use Carbon\Carbon;


class AgentController extends Controller
{
  	public function __construct() 
  	{
  		$this->middleware('auth');
  	}

    public function index(Request $request)
    {
    	$user = Session('user');
    	
    	if ($request->ajax()) {
    	 
    	  $agents = DB::table('agentcontract')
                        ->leftjoin('agentcard', 'agentcard.agentcard_ref','=','agentcontract.agentcard_ref')
                        ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
                        ->leftjoin('users','users.users_id','=','agent.user_id')
                        ->leftjoin('terminal','terminal.terminal_ref','=','agentcontract.terminal_ref')
                        ->leftjoin('sim','sim.sim_serial_no','=','terminal.sim_serial_no')
                        ->leftjoin('agent_type','agent_type.agenttype_id','=','agentcard.agenttype_id')
                        ->where('agentcontract.status','=','Active')
                        ->select([
                               'agentcontract.agentcontract_id',
                               'agent.job_ref as shop_name', 
                               'users.township as township',
                               'agent_type.description as agent_type',
                               'agentcard.factory_cardno as factory_cardno',
                               'agentcontract.terminal_ref as terminal_ref',
                               'terminal.app_version as version',
                               'agentcard.balance_amount as balance',
                               'sim.phone_no as sim',
                               'sim.expire_date as expire_date',
                               'sim.last_balance as last_balance']);


        return Datatables::of($agents)
                      ->where(function ($query) use ($request) {
                            if ($request->has('cardNo')) {
                                $query->where('agentcard.factory_cardno', '=', "{$request->get('cardNo')}");
                            }
                            if ($request->has('terminal')) {
                                $query->where('agentcontract.terminal_ref', '=', "{$request->get('terminal')}");
                            }
                        })
                      ->addColumn('action', function ($agents) {
                          return '<a href="agent/'.$agents->factory_cardno.'/detail" class="btn btn-xs btn-primary" style="width:92px"><i class="glyphicon glyphicon-edit"></i> Detail</a>
                          <a href="agent/'.$agents->factory_cardno.'/transaction" data-fcno="{{$agents->factory_cardno}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-zoom-in"></i> Transaction</a>
                          ';
                        })
                      ->addColumn('expire_date', function ($agents) {
                           return $agents->expire_date ? date('d-m-Y', strtotime($agents->expire_date)) : "";
                        })
                      ->editColumn('balance', function ($agents) {
                            return number_format($agents->balance) . ' MMK ';
                        })
                       ->make(true); 

    	}
    	return view('backend.agent.index', array(   
		      'user' => $user
		    ));  
    }

    public function detail($factory_cardno)
    {

        $editdata = DB::table('agentcontract')
                  ->leftjoin('agentcard','agentcard.agentcard_ref','=','agentcontract.agentcard_ref')
                  ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
                  ->leftjoin('users','users.users_id','=','agent.user_id')
                  ->leftjoin('terminal','terminal.terminal_ref','=','agentcontract.terminal_ref')
                  ->leftjoin('sim','sim.sim_serial_no','=','terminal.sim_serial_no')
                  ->leftjoin('agent_type','agent_type.agenttype_id','=','agentcard.agenttype_id')
                  ->where('agentcard.factory_cardno','=',$factory_cardno)
                  ->where('agentcontract.status','=','Active')
                  ->select('users.user_name As agent_name',
                        'agent.job_ref As short_name',
                        'users.user_nrc as nrc',
                        'users.township as township',
                        'users.mobileno1 as phone_no',
                        'users.address as address',
                        'agentcard.factory_cardno As AgentCard',
                        'agentcontract.terminal_ref as Terminal',
                        'terminal.app_version as Version',
                        'agentcontract.contract_activatation_date as start_date',
                        'agentcard.balance_amount as balance_amount',
                        'sim.phone_no as sim',
                        'sim.operator as operator',
                        'sim.expire_date as expire_date',
                        'sim.last_check_date as last_check_date',
                        'agent_type.description as description',
                        'sim.last_balance as last_balance','users.location')->first();
               

     // dd($editdata);
    
        if (!$editdata->location) {
          $editdata->location = "0, 0";
        }
        

        $user = DB::table('trueemployee')
                ->where('trueemployee.trueemployee_id',Auth::user()->trueemployee_id)
                ->first();

         return view('backend.agent.detail', array(
          'editdata' => $editdata,
          'user' => $user
        )); 
    }

    public function transaction(Request $request,$factory_cardno)
    { 
         
        $today = Carbon::today();
        if ($request->ajax()) {

        $agents = DB::table('transactionlog')
              ->leftjoin('agentcard','transactionlog.agent_card_ref','=','agentcard.agentcard_ref')
              ->leftjoin('topup','transactionlog.transactionlog_id','=','topup.transactionlog_id')
              ->leftjoin('agent_commission','transactionlog.transactionlog_id','=','agent_commission.transactionlog_id')
              ->leftjoin('cnp_payment','transactionlog.transactionlog_id','=','cnp_payment.transactionlog_id')
              ->leftjoin('terminal','transactionlog.terminal_ref','=','terminal.terminal_ref')
              ->leftjoin('agent','agentcard.agent_id','=','agent.agent_id')
              ->leftjoin('activities','transactionlog.activities_ref','=','activities.activities_ref')
              ->join('users','users.users_id','=','agent.user_id')
              ->orderBy('transactionlog.transactionlog_datetime', 'desc')
              ->where("agentcard.factory_cardno", $factory_cardno)
              // ->where('transactionlog.transactionlog_datetime',$today)
              
              ->select([
                "transactionlog.trx",
                "transactionlog.transactionlog_datetime as TransactionDate",
                "topup.phone_no as TopupMobile",
                DB::raw("to_char(transactionlog.pre_agent_card_balance,'99,999,999,999,999,990') as PreBalance"),
                DB::raw("to_char(transactionlog.agent_card_balance,'99,999,999,999,999,990') as PostBalance"),
                DB::raw("to_char(transactionlog.amount,'99,999,999,999,999,990') as SaleAmount"),
                DB::raw("CONCAT('(',(agent_commission.commission),')') as agentcommission"),
                "transactionlog.transaction_status as Status",
                "activities.activities",
                DB::raw("Case when cnp_payment.merchant_code = 'MPT Bill' then 'MPT Bill' when cnp_payment.merchant_code = 'YESC' then 'YESC Bill' when cnp_payment.merchant_code = 'YCDC' then 'YCDC Bill' end")
                ]);
    

        return Datatables::of($agents)
                  ->where(function ($query) use ($request) {
                  if ($request->has('start_date')) {
                      $query->whereDate('transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}");
                  }
                  if ($request->has('end_date')) {
                      $query->whereDate('transactionlog.transactionlog_datetime','<=', "{$request->get('end_date')}");
                  }
              })
                  ->make(true);
         
        

        }
          $user = DB::table('trueemployee')
              ->where('trueemployee.trueemployee_id',Auth::user()->trueemployee_id)
              ->first();

          return view('backend.agent.transaction')->with('user', $user);
    }

}
