<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function __construct() 
	{
		$this->middleware('auth');
	}

	public function index()
	{
		// $result = DB::table('agentcontract')
  //               ->leftjoin('agentcard','agentcard.agentcard_ref','=','agentcontract.agentcard_ref')
  //               ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
  //               ->leftjoin('users','users.users_id','=','agent.user_id')
  //               ->leftjoin('card','card.factory_cardno','=','agentcard.factory_cardno')
  //               ->leftjoin('true_cardtype','true_cardtype.cardtype_id','=','card.cardtype_id')
  //               ->where('agentcontract.status','=','Active')
  //               ->select([
  //                   'agent.job_ref as shop_name',
  //                   'users.address as address',
  //                   'users.township as township',
  //                   'users.province as province',
  //                   'users.location as location',
  //                   '"TrueMoney" as agent_type',
  //               ]);
// 		$tt=DB::select("select shop_name,address,township,province,latitude ||', '|| longitude as location,competitor as type from competitor_agent_info 
// union
// select a.job_ref,u.address,u.township,u.province,u.location,'TrueMoney' as type
// from  agentcontract as ac 
// left join agentcard as acard on acard.agentcard_ref=ac.agentcard_ref 
// left join card as c on c.factory_cardno=acard.factory_cardno 
// left join true_cardtype as tct on tct.cardtype_id=c.cardtype_id 
// left join agent as a on a.agent_id=acard.agent_id 
// left join users as u on u.users_id=a.user_id 
// where ac.status='Active'
// order by type");
// 		dd($tt);

		// $output = DB::table('agentcontract')
  //               ->leftjoin('agentcard','agentcard.agentcard_ref','=','agentcontract.agentcard_ref')
  //               ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
  //               ->leftjoin('users','users.users_id','=','agent.user_id')
  //               ->leftjoin('agent_type','agent_type.agenttype_id','=','agentcard.agenttype_id')
  //               ->where('agentcontract.status','=','Active')
  //               ->select([
  //                   'agent.job_ref as shop_name',
  //                   'users.address as address',
  //                   'users.township as township',
  //                   'users.province as province',
  //                   'users.location as location',
  //                   'agent_type as agent_type',
  //               ]);
  //               dd($output);

        // $output1 = DB::select("select shop_name,address,township,province,latitude ||', '|| longitude as location,competitor as agent_type from competitor_agent_info 
        //                 union
        //                 select a.job_ref,u.address,u.township,u.province,u.location,'TrueMoney' as agent_type
        //                 from  agentcontract as ac 
        //                 left join agentcard as acard on acard.agentcard_ref=ac.agentcard_ref 
        //                 left join card as c on c.factory_cardno=acard.factory_cardno 
        //                 left join true_cardtype as tct on tct.cardtype_id=c.cardtype_id 
        //                 left join agent as a on a.agent_id=acard.agent_id 
        //                 left join users as u on u.users_id=a.user_id 
        //                 where ac.status='Active'
        //                 order by agent_type");

		// dd($output1);
		
       
		$today = Carbon::today();
		$mec_10000 = DB::table('mec_10000_topuppin')
						->where('status','=','Store')
						->count();
        
        $mec_5000 = DB::table('mec_5000_topuppin')
        				->where('status','=','Store')
						->count();

		$mec_3000 = DB::table('mec_3000_topuppin')
        				->where('status','=','Store')
						->count();

		$mec_1000 = DB::table('mec_1000_topuppin')
        				->where('status','=','Store')
						->count();

		$ooredoo_20000 = DB::table('ooredoo_20000_topuppin')
						->where('status','=','Store')
						->count();
        
        $ooredoo_10000 = DB::table('ooredoo_10000_topuppin')
        				->where('status','=','Store')
						->count();

		$ooredoo_5000 = DB::table('ooredoo_5000_topuppin')
        				->where('status','=','Store')
						->count();

		$ooredoo_3000 = DB::table('ooredoo_3000_topuppin')
        				->where('status','=','Store')
						->count();

		$ooredoo_1000 = DB::table('ooredoo_1000_topuppin')
        				->where('status','=','Store')
						->count();

		$mpt_10000 = DB::table('mpt_10000_topuppin')
						->where('status','=','Store')
						->whereNull('remark')
						->count();

		$mpt_5000 = DB::table('mpt_5000_topuppin')
						->where('status','=','Store')
						->whereNull('remark')
						->count();

		$mpt_3000 = DB::table('mpt_3000_topuppin')
					->where('status','Store')
					->whereNull('remark')
					->count();

		$mpt_1000 = DB::table('mpt_1000_topuppin')
					->where('status','Store')
					->whereNull('remark')
					->count();

		$telenor_10000 = DB::table('telenor_10000_topuppin')
						->where('status','Store')
						->whereNull('remark')
						->count();

		$telenor_6000 = DB::table('telenor_6000_topuppin')
						->where('status','Store')
						->whereNull('remark')
						->count();

		$telenor_5000 = DB::table('telenor_5000_topuppin')
						->where('status','Store')
						->whereNull('remark')
						->count();

		$telenor_3000 = DB::table('telenor_3000_topuppin')
						->where('status','Store')
						->whereNull('remark')
						->count();

		$telenor_1000 = DB::table('telenor_1000_topuppin')
						->where('status','Store')
						->whereNull('remark')
						->count();


		$mpt = DB::select("select  
				(select sum(case when  Date(t.purchase_date) <= DATE(NOW()) then t.purchase_amount else 0 end) from eload_transcation t  where t.operator='MPT' or t.operator='MPT_DirectEload') -  
				sum(case when Date(t.topup_date)  <= DATE(NOW()) and (t.eload_status='Using' or t.eload_status='Success') then t.topup_amount else 0 end) as closing_balance
				from topup t
				where (t.payment_status='ELoad_Cash' or t.payment_status='ELoad_TrueCard') and (t.operator='MPT' or t.operator='MPT_DirectEload')");


		$telenor = DB::select("select  
				(select sum(case when  Date(t.purchase_date) <= DATE(NOW()) then t.purchase_amount else 0 end) from eload_transcation t  where t.operator='Telenor_Eload') -  
				sum(case when Date(t.topup_date)  <= DATE(NOW()) and (t.eload_status='Using' or t.eload_status='Success') then t.topup_amount else 0 end) as closing_balance 
				from topup t 
				where (t.payment_status='ELoad_Cash' or t.payment_status='ELoad_TrueCard') and t.operator='Telenor'");


		$ooredoo = DB::select("select  
				(select sum(case when  Date(t.purchase_date) <= DATE(NOW()) then t.purchase_amount else 0 end) from eload_transcation t  where t.operator='Ooredoo' or t.operator='Ooredoo_DirectEload') -  
				sum(case when Date(t.topup_date)  <= DATE(NOW()) and (t.eload_status='Using' or t.eload_status='Success') then t.topup_amount else 0 end) as closing_balance 
				from topup t 
				where (t.payment_status='ELoad_Cash' or t.payment_status='ELoad_TrueCard') and (t.operator='Ooredoo' or t.operator='Ooredoo_DirectEload')");


		$mec = DB::select("select  
				(select sum(case when  Date(t.purchase_date) <= DATE(NOW()) then t.purchase_amount else 0 end) from eload_transcation t  where t.operator='MEC') -  
				sum(case when Date(t.topup_date)  <= DATE(NOW()) and (t.eload_status='Using' or t.eload_status='Success') then t.topup_amount else 0 end) as closing_balance 
				from topup t 
				where (t.payment_status='ELoad_Cash' or t.payment_status='ELoad_TrueCard') and t.operator='MEC'");

		 $user = DB::table('trueemployee')
                ->where('trueemployee.trueemployee_id',Auth::user()->trueemployee_id)
                ->first();


		return view('backend.chart.index',[
            'mec_10000' => $mec_10000,
            'mec_5000'  => $mec_5000,
            'mec_3000'  => $mec_3000,
            'mec_1000'  => $mec_1000,

            'ooredoo_20000' => $ooredoo_20000,
            'ooredoo_10000' => $ooredoo_10000,
            'ooredoo_5000'  => $ooredoo_5000,
            'ooredoo_3000'  => $ooredoo_3000,
            'ooredoo_1000'  => $ooredoo_1000,

            'mpt_10000' => $mpt_10000,
            'mpt_5000'  => $mpt_5000,
            'mpt_3000'  => $mpt_3000,
            'mpt_1000'  => $mpt_1000,

            'telenor_10000' => $telenor_10000,
            'telenor_6000'  => $telenor_6000,
            'telenor_5000'  => $telenor_5000,
            'telenor_3000'  => $telenor_3000,
            'telenor_1000'  => $telenor_1000,

            'mpt' => $mpt,
            'telenor' => $telenor,
            'ooredoo' => $ooredoo,
            'mec' => $mec,
            'user' => $user

        ]);
	}
}
