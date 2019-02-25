<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\Farm;
use App\User; 
use App\Groupfarm;
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


}