<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\Farm;
use App\User; 
use App\Groupfarm;
use App\Term;
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
            return response()->json(['error'=>'failed to fetch'], 401);
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
            return response()->json(['error'=>'failed to get'], 401);
        }
    }

    //EDIT FARM PROFILE 
    public function editFarm(Request $request, $id_farm){
            $farm = Farm::find($id_farm);
            $farm->update($request->only(['jumlah_pohon','varietas','siklus_pertumbuhan',
            'panen_pertama','panen_terakhir','jumlah_produksi_pertahun','latitude_longtitude_1',
            'latitude_longtitude_2','latitude_longtitude_3','latitude_longtitude_4',]));
         //   return response()->json(['error'=>$validator->errors()], 401);
         //   $user = User::find($id);
         //   $user->name = $request->name;
          //  $user->email = $request->email;
          //  $user->no_hp = $request->no_hp;
           // $user->alamat = $request->alamat;
           // $user->save();

            return response()->json(['success' => 'success edit farm profile !'], $this-> successStatus);
        
    }

}