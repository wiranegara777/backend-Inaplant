<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\Farm;
use App\User; 
use App\Groupfarm;
use App\Term;
use App\Varietas;
use Illuminate\Support\Facades\Auth; 
use Validator;
use Illuminate\Support\Facades\DB;

class FarmController extends Controller 
{
public $successStatus = 200;

/** 
     * Register farm api 
       */ 
    public function register(Request $request) { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required',  
            'id_pemilik_lahan' => 'required', 
            'id_farm_manager' => 'required',
            'id_ahli_praktisi' => 'required', 
        ]);
        if ($validator->fails()) { 
                    return response()->json(['error'=>$validator->errors()], 401);            
                } else {
                    $input = $request->all(); 
                    $farm = Farm::create($input); 
                    return response()->json(['success'=>'success added new Farm'], $this-> successStatus); 
                }
    }
    //GET FARM BY AHLI
    public function fetch_by_ahli(){
        $user = Auth::user(); 
        $farms = DB::table('farms')->where('id_ahli_praktisi', $user->id)->get()->toArray();
        return response()->json(['data' => $farms], $this-> successStatus);
    }

    public function postgroupfarm(Request $request){
        $validator = Validator::make($request->all(), [ 
            'name' => 'required',  
            'id_pemilik_lahan' => 'required', 
            'komoditas' => 'required',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);   
         } else {
             $input = $request->all();
             $farm = Groupfarm::create($input);
             return response()->json(['success'=>'success added new GroupFarm'], $this-> successStatus);
         }
    }

    //GET GROUP FARM
    public function getGroupfarm($id){
        $Groupfarm = Groupfarm::find($id);
        if($Groupfarm != NULL){
            return response()->json(['success'=>$Groupfarm], $this-> successStatus);
        } else {
            return response()->json(['error'=>'groupfarm not found !'], 401);
        }
        
    }
 
    //GET GROUP FARM by pemilikl ahan
    public function getGroupfarmpemiliklahan(){
        $user = Auth::user();
        $id = $user->id;
        if($user->role == 1){
            $Groupfarm = Groupfarm::find($id);
            if($Groupfarm != NULL){
                return response()->json(['success'=>$Groupfarm], $this-> successStatus);
            } else {
                return response()->json(['error'=>'groupfarm not found !'], 401);
            }
        }else{
            return response()->json(['error'=>'you are not logged in as pemiik lahan !'], 401);
        }
       
        
    }

    public function postTerm(Request $request){
        $validator = Validator::make($request->all(), [ 
            'name' => 'required',  
            'id_pemilik_lahan' => 'required', 
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);   
         } else {
             $input = $request->all();
             $farm = Term::create($input);
             return response()->json(['success'=>'success added new Term'], $this-> successStatus);
         }
    }

    public function getTerms($id_pemilik_lahan){
        $terms = DB::table('terms')->where('id_pemilik_lahan', $id_pemilik_lahan)->get()->toArray();
        if($terms != NULL){
            return response()->json(['data' => $terms], $this-> successStatus);
        } else {
            return response()->json(['error'=>'terms not found !'], 401);
        }
    }

    //EDIT FARM PROFILE 
    public function editFarm(Request $request, $id_farm){
            $farm = Farm::find($id_farm);
            if($farm != NULL){
                $farm->update($request->only(['jumlah_pohon','varietas','siklus_pertumbuhan',
                'panen_pertama','panen_terakhir','jumlah_produksi_pertahun','latitude_longtitude_1',
                'latitude_longtitude_2','latitude_longtitude_3','latitude_longtitude_4',]));
                return response()->json(['success' => 'success edit farm profile !'], $this-> successStatus);
            }else{
                return response()->json(['error' => 'farm not found !'], 401);
            }         
    }

    public function getPemiliklahan(){
        $user = Auth::user();
        if($user->role == 2){
            $Groupfarm = $user->Groupfarm()->first();
            if($Groupfarm != NULL){
                $group = Groupfarm::find($Groupfarm->id_group_farm);
                return response()->json(['success' => $group], $this-> successStatus);
            } else {
                return response()->json(['failed' => 'you are not assigned to groupfarm !'], 401);
            }   
        } else {
            return response()->json(['failed' => 'you are not logged in as farmmanager'], $this-> successStatus);
        }
     
    }

    public function getFarm(){
        $user = Auth::user();
        if($user->role == 2){
            $farm = DB::table('farms')->where('id_farm_manager', $user->id)->first();
            if($farm == NULL){
                return response()->json(['error' => 'farm not found !'], $this-> successStatus);
            }else{
                $varietas = Varietas::find($farm->varietas);
                $farm = (array) $farm;
                $farm['varietas'] = $varietas;
                return response()->json(['success' => $farm], $this-> successStatus);
            }
        }else{
            return response()->json(['error' => 'you are not logged in as farm manager !'], $this-> successStatus);
        }
        
       
     
    }

    public function getVarietas(){
        $varietas = Varietas::all();
        return response()->json(['success' => $varietas], $this-> successStatus);

    }

    //get list farm that got associated to farm
    public function getfarmmanagergroup($id_group_farm){
        $list_farmmanager = DB::table('assignfarms')->where('id_group_farm', $id_group_farm)->get();
        if($list_farmmanager->isEmpty()){
            return response()->json(['error'=>'farmmanager not found !'], 401);
        } else {
            $sum = [];
            foreach($list_farmmanager as $fm){
               // $array_fm =  (array) $fm;
                $fm_obj = User::find($fm->id_farm_manager);
                //$array_task['status'] = $status->status;
                array_push($sum,$fm_obj); 
            }
            return response()->json(['data' => $sum], $this-> successStatus);
        }
    }

}