<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Yajra\Datatables\Facades\Datatables;
use DB;
use Carbon\Carbon;

class DashboardHisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
       $user = DB::table('trueemployee')
                ->where('trueemployee.trueemployee_id',Auth::user()->trueemployee_id)
                ->first();

        return view('backend.dashboard.history')->with('user', $user);

    }


    public function transaction(Request $request)
    {
        if ($request->ajax()) {

          if ( !$request->has('tran_status') )  {

            $tl = DB::table('transactionlog')
                       ->leftjoin('agentcard', 'transactionlog.agent_card_ref','=','agentcard.agentcard_ref')
                       ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
                       ->leftjoin('users','users.users_id','=','agent.user_id')
                       ->leftjoin('activities','activities.activities_ref','=','transactionlog.activities_ref')
                       ->select([
                              'transactionlog.transactionlog_id as id',
                              'transactionlog.transactionlog_datetime as Date',
                              'agentcard.factory_cardno as AgentCardNo',
                              'agent.job_ref as shop_name',
                              'transactionlog.transaction_status as status',
                              'activities.activities as transaction_detail',
                              'transactionlog.remark as remark']);

           $tl->where('transactionlog.activities_ref','not LIKE','CnP%');
           $tl->whereDate('transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}");
           $tl->whereDate('transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}");

            if (request()->has('search')) {
               $tl->where('agentcard.factory_cardno','like',"%{$request->input('search')}%")
                  ->whereDate('transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                  ->whereDate('transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}");
               $tl->orWhere('agent.job_ref','like',"%{$request->input('search')}%")
                  ->whereDate('transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                  ->whereDate('transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}");
               $tl->orWhere('transactionlog.transaction_status','like',"%{$request->input('search')}%")
                  ->whereDate('transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                  ->whereDate('transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}");
               $tl->orWhere('activities.activities','like',"%{$request->input('search')}%")
                  ->whereDate('transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                  ->whereDate('transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}");
               $tl->orWhere('transactionlog.remark','like',"%{$request->input('search')}%")
                  ->whereDate('transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                  ->whereDate('transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}");
           }
          

            $mtl = DB::table('member_transactionlog')
                      ->leftjoin('agentcard','agentcard.agentcard_ref','=','member_transactionlog.agent_card_ref')
                      ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
                      ->leftjoin('users','users.users_id','=','agent.user_id')
                      ->leftjoin('activities','activities.activities_ref','=','member_transactionlog.activities_ref')    
                      ->select([
                                   'member_transactionlog.member_transactionlog_id as id',
                                   'member_transactionlog.transactionlog_datetime as Date', 
                                   'agentcard.factory_cardno as AgentCardNo', 
                                   'agent.job_ref as shop_name', 
                                   'member_transactionlog.transaction_status as status',
                                   'activities.activities as transaction_detail',
                                   'member_transactionlog.remark as remark']);

              $mtl->where('member_transactionlog.activities_ref','not LIKE','CnP%');
              $mtl->whereDate('member_transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}");
              $mtl->whereDate('member_transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}");

             if (request()->has('search')) {
              $mtl->where('agentcard.factory_cardno','like',"%{$request->input('search')}%")
                  ->whereDate('member_transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                  ->whereDate('member_transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}");

              $mtl->orWhere('agent.job_ref','like',"%{$request->input('search')}%")
                  ->whereDate('member_transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                  ->whereDate('member_transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}");
              $mtl->orWhere('member_transactionlog.transaction_status','like',"%{$request->input('search')}%")
                  ->whereDate('member_transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                  ->whereDate('member_transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}");
              $mtl->orWhere('activities.activities','like',"%{$request->input('search')}%")
                  ->whereDate('member_transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                  ->whereDate('member_transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}");
              $mtl->orWhere('member_transactionlog.remark','like',"%{$request->input('search')}%")
                  ->whereDate('member_transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                  ->whereDate('member_transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}");
            } 
            

            $tl1 = DB::table('transactionlog')
                        ->leftjoin('agentcard','agentcard.agentcard_ref','=','transactionlog.agent_card_ref')
                        ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
                        ->leftjoin('users','users.users_id','=','agent.user_id')
                        ->leftjoin('activities','activities.activities_ref','=','transactionlog.activities_ref')
                        ->leftjoin('cnp_payment','cnp_payment.transactionlog_id','=','transactionlog.transactionlog_id')
                        ->select([
                            'transactionlog.transactionlog_id as id',
                            'transactionlog.transactionlog_datetime as Date',
                            'agentcard.factory_cardno as AgentCardNo',
                            'agent.job_ref as shop_name',
                            'cnp_payment.cnp_status as status',
                            'activities.activities as transaction_detail',
                            'transactionlog.remark as remark']);

             

            $tl1->where('transactionlog.activities_ref','LIKE','CnP%');
            $tl1->where('cnp_payment.cnp_status','=','Pending');
            $tl1->whereDate('transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}");
            $tl1->whereDate('transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}");

            if (request()->has('search')) {
              $tl1->where('agentcard.factory_cardno','like',"%{$request->input('search')}%")
                  ->whereDate('transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                  ->whereDate('transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}");
              $tl1->where('agent.job_ref','like',"%{$request->input('search')}%")
                  ->whereDate('transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                  ->whereDate('transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}");
              $tl1->where('cnp_payment.cnp_status','like',"%{$request->input('search')}%")
                  ->whereDate('transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                  ->whereDate('transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}");
              $tl1->where('activities.activities','like',"%{$request->input('search')}%")
                  ->whereDate('transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                  ->whereDate('transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}");
              $tl1->where('transactionlog.remark','like',"%{$request->input('search')}%")
                  ->whereDate('transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                  ->whereDate('transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}");
            } 
            

            $mtl1 = DB::table('member_transactionlog')
                        ->leftjoin('agentcard','agentcard.agentcard_ref','=','member_transactionlog.agent_card_ref')
                        ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
                        ->leftjoin('users','users.users_id','=','agent.user_id')
                        ->leftjoin('activities','activities.activities_ref','=','member_transactionlog.activities_ref')
                        ->leftjoin('cnp_payment','cnp_payment.transactionlog_id','=','member_transactionlog.member_transactionlog_id')
                        ->select([
                            'member_transactionlog.member_transactionlog_id as id',
                            'member_transactionlog.transactionlog_datetime as Date',
                            'agentcard.factory_cardno as AgentCardNo',
                            'agent.job_ref as shop_name',
                            'cnp_payment.cnp_status as status',
                            'activities.activities as transaction_detail',
                            'member_transactionlog.remark as remark']);

             

            $mtl1->where('member_transactionlog.activities_ref','LIKE','CnP%');
            $mtl1->where('cnp_payment.cnp_status','=','Pending');
            $mtl1->whereDate('member_transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}");
            $mtl1->whereDate('member_transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}");

            if (request()->has('search')) {
              $mtl1->where('agentcard.factory_cardno','like',"%{$request->input('search')}%")
                   ->whereDate('member_transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                   ->whereDate('member_transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}");
              $mtl1->where('agent.job_ref','like',"%{$request->input('search')}%")
                   ->whereDate('member_transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                   ->whereDate('member_transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}");
              $mtl1->where('cnp_payment.cnp_status','like',"%{$request->input('search')}%")
                   ->whereDate('member_transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                   ->whereDate('member_transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}");
              $mtl1->where('activities.activities','like',"%{$request->input('search')}%")
                   ->whereDate('member_transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                   ->whereDate('member_transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}");
              $mtl1->where('member_transactionlog.remark','like',"%{$request->input('search')}%")
                   ->whereDate('member_transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                   ->whereDate('member_transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}");
            } 
             
 
            $exception = DB::table('exception_log')
                              ->leftjoin('agentcard','agentcard.factory_cardno','=','exception_log.agent_card')
                              ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
                              ->leftjoin('users','users.users_id','=','agent.user_id')
                              ->select([
                                'exception_log.id as id',
                                'exception_log.transaction_date as Date',
                                'exception_log.agent_card as AgentCardNo',
                                'agent.job_ref as shop_name',
                                'exception_log.status as status',
                                'exception_log.detail as transaction_detail',
                                'exception_log.remark as remark']);

            $exception->whereDate('exception_log.transaction_date', '>=', "{$request->get('start_date')}");
            $exception->whereDate('exception_log.transaction_date', '<=', "{$request->get('end_date')}");

            if (request()->has('search')) {
              $exception->where('exception_log.agent_card','like',"%{$request->input('search')}%")
                        ->whereDate('exception_log.transaction_date', '>=', "{$request->get('start_date')}")
                        ->whereDate('exception_log.transaction_date', '<=', "{$request->get('end_date')}");
              $exception->orWhere('agent.job_ref','like',"%{$request->input('search')}%")
                        ->whereDate('exception_log.transaction_date', '>=', "{$request->get('start_date')}")
                        ->whereDate('exception_log.transaction_date', '<=', "{$request->get('end_date')}");
              $exception->orWhere('exception_log.status','like',"%{$request->input('search')}%")
                        ->whereDate('exception_log.transaction_date', '>=', "{$request->get('start_date')}")
                        ->whereDate('exception_log.transaction_date', '<=', "{$request->get('end_date')}");
              $exception->orWhere('exception_log.detail','like',"%{$request->input('search')}%")
                        ->whereDate('exception_log.transaction_date', '>=', "{$request->get('start_date')}")
                        ->whereDate('exception_log.transaction_date', '<=', "{$request->get('end_date')}");
              $exception->orWhere('exception_log.remark','like',"%{$request->input('search')}%")
                        ->whereDate('exception_log.transaction_date', '>=', "{$request->get('start_date')}")
                        ->whereDate('exception_log.transaction_date', '<=', "{$request->get('end_date')}");
            }
            

            $exception = $exception->union($tl)
                                   ->union($mtl)
                                   ->union($tl1)
                                   ->union($mtl1);
                                   // ->groupBy('transactionlog.transactionlog_id')
                                   // ->groupBy('member_transactionlog.member_transactionlog_id')
                                   // ->groupBy('exception_log.id');
                                  

            return Datatables::of($exception)->make(true);

          }

          if ( $request->has('tran_status') && $request->get('tran_status') === 'SUCCESSFUL')  {

              $tl = DB::table('transactionlog')
                      ->leftjoin('agentcard', 'transactionlog.agent_card_ref','=','agentcard.agentcard_ref')
                      ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
                      ->leftjoin('users','users.users_id','=','agent.user_id')
                      ->leftjoin('activities','activities.activities_ref','=','transactionlog.activities_ref')
                      ->where('transactionlog.transaction_status', 'SUCCESSFUL')
                      ->whereDate('transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                      ->whereDate('transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}")
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
                      ->where('member_transactionlog.transaction_status', 'SUCCESSFUL')
                      ->whereDate('member_transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                      ->whereDate('member_transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}")
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
                    ->where('cnp_payment.cnp_status','=','SUCCESSFUL')
                    ->whereDate('transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                    ->whereDate('transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}")
                    ->select([
                            'transactionlog.transactionlog_id as id',
                            'transactionlog.transactionlog_datetime as Date',
                            'agentcard.factory_cardno as AgentCardNo',
                            'agent.job_ref as shop_name',
                            'cnp_payment.cnp_status as status',
                            'activities.activities as transaction_detail',
                            'transactionlog.remark as remark'])
                    ->union($tl)
                    ->union($mtl);

          

                                   
                                   
              return Datatables::of($tl1)->make(true);
          } 

          if ( $request->has('tran_status') && $request->get('tran_status') === 'FAIL')  {

              $tl = DB::table('transactionlog')
                      ->leftjoin('agentcard', 'transactionlog.agent_card_ref','=','agentcard.agentcard_ref')
                      ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
                      ->leftjoin('users','users.users_id','=','agent.user_id')
                      ->leftjoin('activities','activities.activities_ref','=','transactionlog.activities_ref')
                      ->where('transactionlog.transaction_status', 'FAIL')
                      ->whereDate('transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                      ->whereDate('transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}")
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
                      ->where('member_transactionlog.transaction_status', 'FAIL')
                      ->whereDate('member_transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                      ->whereDate('member_transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}")
                      ->select([
                                 'member_transactionlog.member_transactionlog_id as id',
                                 'member_transactionlog.transactionlog_datetime as Date', 
                                 'agentcard.factory_cardno as AgentCardNo', 
                                 'agent.job_ref as shop_name', 
                                 'member_transactionlog.transaction_status as status',
                                 'activities.activities as transaction_detail',
                                 'member_transactionlog.remark as remark'])
                      ->union($tl);

            
                                  
              return Datatables::of($mtl)->make(true);
          } 

          if ( $request->has('tran_status') && $request->get('tran_status') === 'Pending')  {

              $tl = DB::table('transactionlog')
                      ->leftjoin('agentcard', 'transactionlog.agent_card_ref','=','agentcard.agentcard_ref')
                      ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
                      ->leftjoin('users','users.users_id','=','agent.user_id')
                      ->leftjoin('activities','activities.activities_ref','=','transactionlog.activities_ref')
                      ->leftjoin('cnp_payment','cnp_payment.transactionlog_id','=','transactionlog.transactionlog_id')
                      ->where('transactionlog.activities_ref', 'like', 'CnP%')
                      ->where('cnp_payment.cnp_status', 'Pending')
                      ->whereDate('transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                      ->whereDate('transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}")
                      ->select([
                             'transactionlog.transactionlog_id as id',
                             'transactionlog.transactionlog_datetime as Date', 
                             'agentcard.factory_cardno as AgentCardNo', 
                             'agent.job_ref as shop_name', 
                             'cnp_payment.cnp_status as status',
                             'activities.activities as transaction_detail',
                             'transactionlog.remark as remark']);


              $mtl = DB::table('member_transactionlog')
                      ->leftjoin('agentcard','agentcard.agentcard_ref','=','member_transactionlog.agent_card_ref')
                      ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
                      ->leftjoin('users','users.users_id','=','agent.user_id')
                      ->leftjoin('activities','activities.activities_ref','=','member_transactionlog.activities_ref')
                      ->leftjoin('cnp_payment','cnp_payment.transactionlog_id','=','member_transactionlog.member_transactionlog_id')
                      ->where('member_transactionlog.activities_ref','like','CnP%')
                      ->where('cnp_payment.cnp_status','=','Pending')
                      ->whereDate('member_transactionlog.transactionlog_datetime', '>=', "{$request->get('start_date')}")
                      ->whereDate('member_transactionlog.transactionlog_datetime', '<=', "{$request->get('end_date')}")
                      ->select([
                                 'member_transactionlog.member_transactionlog_id as id',
                                 'member_transactionlog.transactionlog_datetime as Date', 
                                 'agentcard.factory_cardno as AgentCardNo', 
                                 'agent.job_ref as shop_name', 
                                 'cnp_payment.cnp_status as status',
                                 'activities.activities as transaction_detail',
                                 'member_transactionlog.remark as remark'])
                      ->union($tl);

              return Datatables::of($mtl)->make(true);
          } 

          if ( $request->has('tran_status') && $request->get('tran_status') === 'Exception'){

              $exception = DB::table('exception_log')
                            ->leftjoin('agentcard','agentcard.factory_cardno','=','exception_log.agent_card')
                            ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
                            ->leftjoin('users','users.users_id','=','agent.user_id')
                            ->whereDate('exception_log.transaction_date', '>=', "{$request->get('start_date')}")
                            ->whereDate('exception_log.transaction_date', '<=', "{$request->get('end_date')}")
                            ->select([
                                'exception_log.id as id',
                                'exception_log.transaction_date as Date',
                                'exception_log.agent_card as AgentCardNo',
                                'agent.job_ref as shop_name',
                                'exception_log.status as status',
                                'exception_log.detail as transaction_detail',
                                'exception_log.remark as remark']);

            
                return Datatables::of($exception)->make(true);
          } 

        }
     
    }


    public function dashboard_trans_allTrans(Request $request)
    {

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $tlc  = DB::table('transactionlog');

        if ($start_date) {
          $tlc->whereDate('transactionlog.transactionlog_datetime', '>=', $start_date );
        }
           
        if ($end_date) {
          $tlc->whereDate('transactionlog.transactionlog_datetime','<=', $end_date );
        }
                   
        $tlc = $tlc->count('transactionlog_id');

        $mtlc  = DB::table('member_transactionlog');

        if ($start_date) {
          $mtlc->whereDate('member_transactionlog.transactionlog_datetime', '>=', $start_date );
        }
           
        if ($end_date) {
          $mtlc->whereDate('member_transactionlog.transactionlog_datetime','<=', $end_date );
        }

        $mtlc = $mtlc->count('member_transactionlog_id');

        $excep = DB::table('exception_log');

        if ($start_date) {
          $excep->whereDate('exception_log.transaction_date', '>=', $start_date );
        }
           
        if ($end_date) {
          $excep->whereDate('exception_log.transaction_date','<=', $end_date );
        }

        $excep = $excep->count('id');

        $all_transcount = $tlc + $mtlc + $excep;

           return response()->json([
            'all_transcount' => $all_transcount
           
        ]);
    }

    public function dashboard_trans_successTrans(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $tlc1 = DB::table('transactionlog')
                  ->leftjoin('agentcard','agentcard.agentcard_ref','=','transactionlog.agent_card_ref')
                  ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
                  ->leftjoin('users','users.users_id','=','agent.user_id')
                  ->leftjoin('activities','activities.activities_ref','=','transactionlog.activities_ref')
                  ->where('transactionlog.transaction_status','=','SUCCESSFUL')
                  ->where('transactionlog.activities_ref','not like','CnP%');

        if ($start_date) {
          $tlc1->whereDate('transactionlog.transactionlog_datetime', '>=', $start_date );
        }
           
        if ($end_date) {
          $tlc1->whereDate('transactionlog.transactionlog_datetime','<=', $end_date );
        }
                  
        $tlc1 = $tlc1->count('transactionlog.transactionlog_id');

        $mtlc1 = DB::table('member_transactionlog')
                  ->leftjoin('agentcard','agentcard.agentcard_ref','=','member_transactionlog.agent_card_ref')
                  ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
                  ->leftjoin('users','users.users_id','=','agent.user_id')
                  ->leftjoin('activities','activities.activities_ref','=','member_transactionlog.activities_ref')
                  ->where('member_transactionlog.transaction_status','=','SUCCESSFUL');

        if ($start_date) {
          $mtlc1->whereDate('member_transactionlog.transactionlog_datetime', '>=', $start_date );
        }
        
        if ($end_date) {
          $mtlc1->whereDate('member_transactionlog.transactionlog_datetime','<=', $end_date );
        }  
                  
        $mtlc1 = $mtlc1->count('member_transactionlog.member_transactionlog_id');

        $transat = DB::table('transactionlog')
                  ->leftjoin('agentcard','agentcard.agentcard_ref','=','transactionlog.agent_card_ref')
                  ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
                  ->leftjoin('users','users.users_id','=','agent.user_id')
                  ->leftjoin('activities','activities.activities_ref','=','transactionlog.activities_ref')
                  ->leftjoin('cnp_payment','cnp_payment.transactionlog_id','=','transactionlog.transactionlog_id')
                  ->where('cnp_payment.cnp_status','=','Success')
                  ->where('transactionlog.activities_ref','like','CnP%');

        if($start_date) {
          $transat->whereDate('transactionlog.transactionlog_datetime', '>=', $start_date );
        }
        
        if($end_date) {
          $transat->whereDate('transactionlog.transactionlog_datetime','<=', $end_date );
        }
        
        $transat = $transat->count('transactionlog.transactionlog_id');

        $success_trans = $tlc1 + $mtlc1 +$transat;

        return response()->json([
            'success_trans' => $success_trans
           
        ]);
    }

     public function dashboard_trans_failTrans(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $tlc2  = DB::table('transactionlog')
           ->where('transactionlog.transaction_status','=','FAIL');

        if ($start_date) {
          $tlc2->whereDate('transactionlog.transactionlog_datetime', '>=', $start_date );
        }

        if ($end_date) {
          $tlc2->whereDate('transactionlog.transactionlog_datetime','<=', $end_date );
        }

        $tlc2 = $tlc2->count('transactionlog_id');
                  

        $mtlc2  = DB::table('member_transactionlog')
                   ->where('member_transactionlog.transaction_status','=','FAIL');

        if ($start_date) {
          $mtlc2->whereDate('member_transactionlog.transactionlog_datetime', '>=', $start_date );
        }

        if ($end_date) {
          $mtlc2->whereDate('member_transactionlog.transactionlog_datetime','<=', $end_date );
        }
                   
                   
        $mtlc2 = $mtlc2->count('member_transactionlog_id');

        $fail_trans = $tlc2+$mtlc2;


        return response()->json([
            'fail_trans' => $fail_trans
           
        ]);
    }

     public function dashboard_trans_pendingTrans(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $tlc3 = DB::table('transactionlog')
           ->leftjoin('agentcard','agentcard.agentcard_ref','=','transactionlog.agent_card_ref')
           ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
           ->leftjoin('users','users.users_id','=','agent.user_id')
           ->leftjoin('activities','activities.activities_ref','=','transactionlog.activities_ref')
           ->leftjoin('cnp_payment','cnp_payment.transactionlog_id','=','transactionlog.transactionlog_id')
           ->where('transactionlog.activities_ref','like','CnP%')
           ->where('cnp_payment.cnp_status','=','Pending');

        if ($start_date) {
          $tlc3->whereDate('transactionlog.transactionlog_datetime', '>=',  $start_date );
        }
        
        if ($end_date) {
          $tlc3->whereDate('transactionlog.transactionlog_datetime','<=', $end_date );
        } 
           
        $tlc3 = $tlc3->count('transactionlog.transactionlog_id');
          

        $mtlc3 = DB::table('member_transactionlog')
            ->leftjoin('cnp_payment','member_transactionlog.member_transactionlog_id','=','cnp_payment.member_transactionlog_id')
            ->leftjoin('agentcard','agentcard.agentcard_ref','=','member_transactionlog.agent_card_ref')
            ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
            ->leftjoin('users','users.users_id','=','agent.user_id')
            ->leftjoin('activities','activities.activities_ref','=','member_transactionlog.activities_ref')
            ->where('member_transactionlog.activities_ref','like','CnP%')
            ->where('cnp_payment.cnp_status','=','Pending');

        if ($start_date) {
          $mtlc3->whereDate('member_transactionlog.transactionlog_datetime', '>=', $start_date );
        }

        if ($end_date) {
          $mtlc3->whereDate('member_transactionlog.transactionlog_datetime','<=', $end_date );
        }
                        
        $mtlc3 = $mtlc3->count('member_transactionlog.member_transactionlog_id');

        $pending_trans = $tlc3+$mtlc3;


       return response()->json([
         'pending_trans' => $pending_trans
           
       ]);
    }


    public function dashboard_trans_exceptionTrans(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $excep= DB::table('exception_log')
                  ->leftjoin('agentcard','agentcard.factory_cardno','=','exception_log.agent_card')
                  ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
                  ->leftjoin('users','users.users_id','=','agent.user_id');
         
        if ($start_date) {
          $excep->whereDate('exception_log.transaction_date', '>=', $start_date );
        }
        
        if ($end_date) {
          $excep->whereDate('exception_log.transaction_date','<=', $end_date );
        } 
           
        $excep = $excep->count('id');      

       return response()->json([
          'exception_trans' => $excep
        ]);
    }
}
