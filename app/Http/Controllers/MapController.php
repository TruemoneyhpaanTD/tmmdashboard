<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class MapController extends Controller
{
    protected $markers = []; 
    protected $infos = [];

    public function __construct() 
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $user = Session('user');
      return view('backend.map.index', array(   
          'user' => $user
        ));
    }

    public function getData(Request $request)
    {
        $agents = $this->getAllAgent();              
        // dd($agents);
        if($request->has('city') && $request->get('city') != 'all'){
            $agents = $agents->where('users.province',$request->get('city'));
        }

        if($request->has('agentType') && $request->get('agentType') != 'all'){
            $agents = $agents->where('agent_type',$request->get('agentType'));
        }
        
        $agents = $agents->get();
        // dd($agents);

        $this->getMapInfo($agents);
        
        return view('backend.map.map', array(   
          'markers' => $this->markers,
          'infos' => $this->infos
        ));
    }

    public function getAllAgent()
    {
      return DB::table('agentcontract')
                ->leftjoin('agentcard','agentcard.agentcard_ref','=','agentcontract.agentcard_ref')
                ->leftjoin('agent','agent.agent_id','=','agentcard.agent_id')
                ->leftjoin('users','users.users_id','=','agent.user_id')
                ->leftjoin('agent_type','agent_type.agenttype_id','=','agentcard.agenttype_id')
                ->where('agentcontract.status','=','Active')
                ->select([
                    'agent.job_ref as shop_name',
                    'users.address as address',
                    'users.township as township',
                    'users.province as province',
                    'users.location as location',
                    'agent_type as agent_type',
                ]);
    }
    public function getMapInfo($agents)
    {
      $marker = []; 
      $info = [];
      foreach ($agents as  $agent) 
      { 

        // if ($agent->location == null) 
        // {
        //   continue;
        // }
        if ( ($agent->location == null) || (strpos($agent->location, 'N') || strpos($agent->location, 'E') || strpos($agent->location, 'NL') !== false) || ($agent->location == "-"))
       {
         
         continue;
       
       }
        $location = explode(', ', $agent->location);
        $label = $this->getLabel($agent->agent_type);
        $marker = [
                  $label,
                  $location[0], 
                  $location[1],
                ];
        $info = [
                "
                <div class='info_content'>
                  <h4 style='color:#663399;'>$agent->shop_name</h4>
                  <p style='font-style:oblique;'>$agent->address</p>
                </div>"
              ];
        
        $this->markers[] = $marker;

        $this->infos[] = $info;

      } 
      // dd($marker);
    }
    public function getLabel($agent_type)
    {
        if($agent_type == 'TrueAgent'){
          return 'T';
        }
        if($agent_type == 'TrueAGDAgent'){
          return 'R';
        }
        if($agent_type == 'AGDAgent'){
          return 'A';
        }
    }
}