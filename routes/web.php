<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('login','LoginController@showLogin');
Route::post('login','LoginController@authenticate');
Route::post('logout', 'LoginController@logout');

//Show Transaction Live
Route::get('/dashboard', 'HomeController@index');
Route::get('/transaction', 'HomeController@transaction');
Route::get('/dahboard_allTrans', 'HomeController@dashboard_allTrans');
Route::get('/dashboard_successTrans', 'HomeController@dashboard_successTrans');
Route::get('/dashboard_failTrans', 'HomeController@dashboard_failTrans');
Route::get('/dashboard_pendingTrans', 'HomeController@dashboard_pendingTrans');
Route::get('/dashboard_exceptionTrans', 'HomeController@dashboard_exceptionTrans');



//Show Transaction History
Route::get('/dashboardHistory','DashboardHisController@index');
Route::get('/transactionHistory', 'DashboardHisController@transaction');
Route::get('/dashboard_trans_allTrans', 'DashboardHisController@dashboard_trans_allTrans');
Route::get('/dashboard_trans_successTrans', 'DashboardHisController@dashboard_trans_successTrans');
Route::get('/dashboard_trans_failTrans', 'DashboardHisController@dashboard_trans_failTrans');
Route::get('/dashboard_trans_pendingTrans', 'DashboardHisController@dashboard_trans_pendingTrans');
Route::get('/dashboard_trans_exceptionTrans', 'DashboardHisController@dashboard_trans_exceptionTrans');

// Show all agents
Route::get('agent','AgentController@index');
Route::get('agent/{factory_cardno}/detail', 'AgentController@detail');
Route::get('agent/{factory_cardno}/transaction', 'AgentController@transaction');
// Route::get('agent/{id}/detail', 'AgentController@detail');


// Show Profile
Route::get('profile','ProfileController@getprofile');

// //Transaction Chart
Route::get('chart','ChartController@index');

// //Show Map 
// Route::get('/map/city/{city}', 'MapController@getData');
Route::get('map','MapController@index');
Route::get('show_map','MapController@getData');

//For Index
Route::get('weeklySaleTransaction','ExampleController@index');
Route::get('agentNetwork','Example1Controller@index');
Route::get('dailySales','Example2Controller@index');
Route::get('operatorsale','operatorSaleController@index');


Route::get('allcall','allCallController@index');
Route::get('eload','eloadController@index');
Route::get('remittance','remittanceController@index');
// Route::get('test','testController@index');







