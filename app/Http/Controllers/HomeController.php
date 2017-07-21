<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Yajra\Datatables\Facades\Datatables;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    { 

         $user = DB::table('trueemployee')
                ->where('trueemployee.trueemployee_id',Auth::user()->trueemployee_id)
                ->first();

        return view('backend.dashboard.home')->with('user', $user);


    }
    public function transaction(Request $request)
    {
        if ($request->ajax()) {
            
           $today = Carbon::today();
           $tl = DB::table('transactionlog')
                        ->leftjoin('agentcard', 'transactionlog.agent_card_ref','=','agentcard.agentcard_ref')
                        ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
                        ->leftjoin('users','users.users_id','=','agent.user_id')
                        ->leftjoin('activities','activities.activities_ref','=','transactionlog.activities_ref')
                        ->where('transactionlog.activities_ref','not LIKE','CnP%')
                        ->whereDate('transactionlog.transactionlog_datetime', '>=', $today)
                        ->whereDate('transactionlog.transactionlog_datetime', '<=', $today)
                        ->select([
                               'transactionlog.transactionlog_id as id',
                               'transactionlog.transactionlog_datetime as Date', 
                               'agentcard.factory_cardno as AgentCardNo', 
                               'agent.job_ref as shop_name', 
                               'transactionlog.transaction_status as status',
                               'activities.activities as transaction_detail',
                               'transactionlog.remark as remark']);


            $mtl = DB::table('member_transactionlog')
                        ->leftjoin('agentcard','agentcard.agentcard_ref','=','member_transactionlog.agent_card_ref')
                        ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
                        ->leftjoin('users','users.users_id','=','agent.user_id')
                        ->leftjoin('activities','activities.activities_ref','=','member_transactionlog.activities_ref')
                        ->where('member_transactionlog.activities_ref','not LIKE','CnP%')
                        ->whereDate('member_transactionlog.transactionlog_datetime', '>=', $today)
                        ->whereDate('member_transactionlog.transactionlog_datetime', '<=', $today)
                        ->select([
                                   'member_transactionlog.member_transactionlog_id as id',
                                   'member_transactionlog.transactionlog_datetime as Date', 
                                   'agentcard.factory_cardno as AgentCardNo', 
                                   'agent.job_ref as shop_name', 
                                   'member_transactionlog.transaction_status as status',
                                   'activities.activities as transaction_detail',
                                   'member_transactionlog.remark as remark']);


            $tl1= DB::table('transactionlog')
                    ->leftjoin('agentcard','agentcard.agentcard_ref','=','transactionlog.agent_card_ref')
                    ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
                    ->leftjoin('users','users.users_id','=','agent.user_id')
                    ->leftjoin('activities','activities.activities_ref','=','transactionlog.activities_ref')
                    ->leftjoin('cnp_payment','cnp_payment.transactionlog_id','=','transactionlog.transactionlog_id')
                    ->where('transactionlog.activities_ref','LIKE','CnP%')
                    ->where('cnp_payment.cnp_status','=','Pending')
                    ->whereDate('transactionlog.transactionlog_datetime', '>=', $today)
                    ->whereDate('transactionlog.transactionlog_datetime', '<=', $today)
                    ->select([
                            'transactionlog.transactionlog_id as id',
                            'transactionlog.transactionlog_datetime as Date',
                            'agentcard.factory_cardno as AgentCardNo',
                            'agent.job_ref as shop_name',
                            'cnp_payment.cnp_status as status',
                            'activities.activities as transaction_detail',
                            'transactionlog.remark as remark']);

            $mtl1= DB::table('member_transactionlog')
                    ->leftjoin('agentcard','agentcard.agentcard_ref','=','member_transactionlog.agent_card_ref')
                    ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
                    ->leftjoin('users','users.users_id','=','agent.user_id')
                    ->leftjoin('activities','activities.activities_ref','=','member_transactionlog.activities_ref')
                    ->leftjoin('cnp_payment','cnp_payment.transactionlog_id','=','member_transactionlog.member_transactionlog_id')
                    ->where('member_transactionlog.activities_ref','LIKE','CnP%')
                    ->where('cnp_payment.cnp_status','=','Pending')
                    ->whereDate('member_transactionlog.transactionlog_datetime', '>=', $today)
                    ->whereDate('member_transactionlog.transactionlog_datetime', '<=', $today)
                    ->select([
                            'member_transactionlog.member_transactionlog_id as id',
                            'member_transactionlog.transactionlog_datetime as Date',
                            'agentcard.factory_cardno as AgentCardNo',
                            'agent.job_ref as shop_name',
                            'cnp_payment.cnp_status as status',
                            'activities.activities as transaction_detail',
                            'member_transactionlog.remark as remark']);

            $exception = DB::table('exception_log')
                            ->leftjoin('agentcard','agentcard.factory_cardno','=','exception_log.agent_card')
                            ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
                            ->leftjoin('users','users.users_id','=','agent.user_id')
                            ->whereDate('exception_log.transaction_date', '>=', $today)
                            ->whereDate('exception_log.transaction_date', '<=', $today)
                            ->select([
                                'exception_log.id as id',
                                'exception_log.transaction_date as Date',
                                'exception_log.agent_card as AgentCardNo',
                                'agent.job_ref as shop_name',
                                'exception_log.status as status',
                                'exception_log.detail as transaction_detail',
                                'exception_log.remark as remark'])
                            ->union($tl)
                            ->union($mtl)
                            ->union($tl1)
                            ->union($mtl1)
                            ->limit(100);

            return Datatables::of($exception)->make(true);
          }
     
    }

    public function dashboard_allTrans()
    {
        $today = Carbon::today();
         $tlc  = DB::table('transactionlog')
                   ->whereDate('transactionlog.transactionlog_datetime', '>=', $today )
                   ->whereDate('transactionlog.transactionlog_datetime','<=', $today )
                   ->count('transactionlog_id');

        $mtlc  = DB::table('member_transactionlog')
                   ->whereDate('member_transactionlog.transactionlog_datetime', '>=', $today )
                   ->whereDate('member_transactionlog.transactionlog_datetime','<=', $today )
                   ->count('member_transactionlog_id');

        $excep = DB::table('exception_log')
                  ->whereDate('exception_log.transaction_date','>=', $today)
                  ->whereDate('exception_log.transaction_date','<=', $today)
                  ->count('id');

        $all_transcount = $tlc + $mtlc + $excep;

 
           return response()->json([
            'all_transcount' => $all_transcount
           
        ]);
    }

    public function dashboard_successTrans()
    {
        $today = Carbon::today();
        $tlc1 = DB::table('transactionlog')
                  ->leftjoin('agentcard','agentcard.agentcard_ref','=','transactionlog.agent_card_ref')
                  ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
                  ->leftjoin('users','users.users_id','=','agent.user_id')
                  ->leftjoin('activities','activities.activities_ref','=','transactionlog.activities_ref')
                  ->where('transactionlog.transaction_status','=','SUCCESSFUL')
                  ->where('transactionlog.activities_ref','not like','CnP%')
                  ->whereDate('transactionlog.transactionlog_datetime', '>=', $today )
                  ->whereDate('transactionlog.transactionlog_datetime','<=', $today )
                  ->count('transactionlog.transactionlog_id');


        $mtlc1 = DB::table('member_transactionlog')
                  ->leftjoin('agentcard','agentcard.agentcard_ref','=','member_transactionlog.agent_card_ref')
                  ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
                  ->leftjoin('users','users.users_id','=','agent.user_id')
                  ->leftjoin('activities','activities.activities_ref','=','member_transactionlog.activities_ref')
                  ->where('member_transactionlog.transaction_status','=','SUCCESSFUL')
                  ->whereDate('member_transactionlog.transactionlog_datetime', '>=', $today )
                  ->whereDate('member_transactionlog.transactionlog_datetime','<=', $today )
                  ->count('member_transactionlog.member_transactionlog_id');

        $transat = DB::table('transactionlog')
                  ->leftjoin('agentcard','agentcard.agentcard_ref','=','transactionlog.agent_card_ref')
                  ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
                  ->leftjoin('users','users.users_id','=','agent.user_id')
                  ->leftjoin('activities','activities.activities_ref','=','transactionlog.activities_ref')
                  ->leftjoin('cnp_payment','cnp_payment.transactionlog_id','=','transactionlog.transactionlog_id')
                  ->where('cnp_payment.cnp_status','=','Success')
                  ->where('transactionlog.activities_ref','like','CnP%')
                  ->whereDate('transactionlog.transactionlog_datetime', '>=', $today )
                  ->whereDate('transactionlog.transactionlog_datetime','<=', $today )
                  ->count('transactionlog.transactionlog_id');

        $success_trans = $tlc1 + $mtlc1 +$transat;

           return response()->json([
            'success_trans' => $success_trans
           
        ]);
    }

    public function dashboard_failTrans()
    {
        $today = Carbon::today();
        $tlc2  = DB::table('transactionlog')
           ->where('transactionlog.transaction_status','=','FAIL')
           ->whereDate('transactionlog.transactionlog_datetime', '>=', $today )
           ->whereDate('transactionlog.transactionlog_datetime','<=', $today )
           ->count('transactionlog_id');
                  

        $mtlc2  = DB::table('member_transactionlog')
                   ->where('member_transactionlog.transaction_status','=','FAIL')
                   ->whereDate('member_transactionlog.transactionlog_datetime', '>=', $today )
                   ->whereDate('member_transactionlog.transactionlog_datetime','<=', $today )
                   ->count('member_transactionlog_id');

        $fail_trans = $tlc2+$mtlc2;


           return response()->json([
            'fail_trans' => $fail_trans
           
        ]);
    }

    public function dashboard_pendingTrans()
    {
        $today = Carbon::today();
        $tlc3 = DB::table('transactionlog')
           ->leftjoin('cnp_payment','transactionlog.transactionlog_id','=','cnp_payment.transactionlog_id')
           ->whereDate('transactionlog.transactionlog_datetime', '>=', $today )
           ->whereDate('transactionlog.transactionlog_datetime','<=', $today )
           ->where('cnp_payment.cnp_status','=','Pending')
           ->count();
          

        $mtlc3 = DB::table('member_transactionlog')
            ->leftjoin('cnp_payment','member_transactionlog.member_transactionlog_id','=','cnp_payment.member_transactionlog_id')
            ->whereDate('member_transactionlog.transactionlog_datetime', '>=', $today )
            ->whereDate('member_transactionlog.transactionlog_datetime','<=', $today )
            ->where('cnp_payment.cnp_status','=','Pending')
            ->count();

            $pending_trans = $tlc3+$mtlc3;


           return response()->json([
            'pending_trans' => $pending_trans
           
        ]);
    }

    public function dashboard_exceptionTrans()
    {
        $today = Carbon::today();
        $exception_trans= DB::table('exception_log')
                ->whereDate('transaction_date','>=',$today)
                ->whereDate('transaction_date','<=',$today)
                ->count();

       return response()->json([
          'exception_trans' => $exception_trans
        ]);
    }

}
