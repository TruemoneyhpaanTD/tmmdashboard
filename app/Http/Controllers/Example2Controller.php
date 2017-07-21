<?php

namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Example2Controller extends Controller
{
    public function __construct() 
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $todaydate = Date('Y-m-d');
      $operators = DB::table('topup')
                ->select(DB::raw("operator,SUM(topup.topup_amount)"))
                ->where('eload_status','Success')
                ->whereDate('topup_date','=',$todaydate)
                ->groupBy('operator')
                ->get();

        $data = [];
        foreach($operators as $operator)
        {
        array_push($data,$operator->sum);
        }
        // dd($data);

        $remittance = DB::table('transactionlog')
                ->select(DB::raw("activities_ref,SUM(amount)"))
                ->whereIn('activities_ref',['NT2NT','TcashOut','IRS_Cashout'])
                ->where('transaction_status','=','SUCCESSFUL')
                ->whereDate('transactionlog_datetime','=',$todaydate)
                ->groupBy('activities_ref')
                ->get();
        // dd($remittance);

        $remittanceResult = [];
        foreach ($remittance as $remittance) {
            array_push($remittanceResult, $remittance->sum);
        }
        // dd($remittanceResult);

        $dailyComm1 = DB::table('transactionlog')
                    ->leftjoin('truemoney_commission','truemoney_commission.transactionlog_id','=','transactionlog.transactionlog_id')
                    ->select(DB::raw("SUM(truemoney_commission.in_commission)"))
                    ->where('transactionlog.transaction_status','=','SUCCESSFUL')
                    ->whereDate('transactionlog.transactionlog_datetime','=',$todaydate)
                    ->sum('truemoney_commission.in_commission');
        $dailyComm = number_format($dailyComm1);
      

        $dailySales1 = DB::table('transactionlog')
                ->select(DB::raw("SUM(amount)"))
                ->where('transactionlog.transaction_status','=','SUCCESSFUL')
                ->whereDate('transactionlog_datetime','=',$todaydate)
                ->where('transactionlog.activities_ref',
                '!=','TcashOut')
                ->where('transactionlog.activities_ref','!=',
                'RefillAgent')
                ->where('transactionlog.activities_ref','!=',
                'RefillAgentByBank')
                ->where('transactionlog.activities_ref','!=',
                'SalesPerson Auto Refill')
                ->where('transactionlog.activities_ref','!=',
                'SalesPerson Refill')
                ->sum('amount');
        $dailySaless = number_format($dailySales1);


        $billPayments = DB::table('transactionlog')
                ->select(DB::raw("activities_ref,SUM(amount)"))
                ->whereRaw("activities_ref like any (array['Aeon%','CnP%','HelloCabs%','Titan%','Bnf%'])")
                ->where('transaction_status','=','SUCCESSFUL')
                ->whereDate('transactionlog_datetime','=',$todaydate)
                ->groupBy('activities_ref')
                ->get();
                // dd($billPayments);
        
        
        $billPaymentData = [];
        $billPaymentResult = [];
        foreach ($billPayments as $billPayment) {
            $first_three_chars = substr($billPayment->activities_ref, 0,3);
            // dd($first_three_chars);
            $activities_ref = "";
            switch ($first_three_chars) {
                case 'CnP':
                    $activities_ref = "CNP";
                    $billPaymentResult[$activities_ref] = 0;
                    $billPaymentResult[$activities_ref] += $billPayment->sum;
                    break;

                case 'Bnf':
                    $activities_ref = "Bnf";
                    $billPaymentResult[$activities_ref] = 0;
                    $billPaymentResult[$activities_ref] += $billPayment->sum;
                    break;

                case 'Aeo':
                    $activities_ref = "Aeon";
                    $billPaymentResult[$activities_ref] = 0;
                    $billPaymentResult[$activities_ref] += $billPayment->sum;
                    break;

                case 'Tit':
                    $activities_ref = "Titan";
                    $billPaymentResult[$activities_ref] = 0;
                    $billPaymentResult[$activities_ref] += $billPayment->sum;
                    break;

                case 'Hel':
                    $activities_ref = "HelloCabs";
                    $billPaymentResult[$activities_ref] = 0;
                    $billPaymentResult[$activities_ref] += $billPayment->sum;
                    break;
                
                default:
                    # code...
                    break;
            }
            array_push($billPaymentData, $activities_ref);
        }

        $billPaymentData = array_unique($billPaymentData);
        // dd($billPaymentData);

        // sort($billPaymentData);

        ksort($billPaymentResult);
        // dd(ksort($billPaymentResult));

        $echartBarData = [];

        $echartBarVal = [
            'name' => '',
            'type' => 'bar',
            'data' => [],

            'markLine' => [
                'data' => [
                  'type' => 'average',
                  'name' => '???'
                ]
            ]
        ];

        foreach ($billPaymentResult as $key => $value) {
            $echartBarVal['name'] = $key;
            $echartBarVal['data'] = [];
            $echartBarVal['data'][] = $value;
            $echartBarData[] = $echartBarVal;
        }
    
               
    	$user = Session('user');
    	return view('backend.example2.index', array(   
          'user' => $user,
          'data' => $data,
          'dailyComm' => $dailyComm,
          'dailySaless' => $dailySaless,
          'remittanceResult' => $remittanceResult,
          'billPaymentData' => $billPaymentData,
          'echartBarData' => $echartBarData,
         
        ));
    }
}
