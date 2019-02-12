<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\Farm;
use App\User;
use App\Report; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller 
{
public $successStatus = 200;

/** 
     * Register farm api 
       */ 
    public function register(Request $request) { 
        $validator = Validator::make($request->all(), [ 
            'farm_id' => 'required', 
            'deskripsi' => 'required',
        ]);
        if ($validator->fails()) { 
                    return response()->json(['error'=>$validator->errors()], 401);            
                } else {
                    $input = $request->all(); 
                    $report = Report::create($input); 
                    return response()->json(['success'=>'success added new report'], $this-> successStatus); 
                }
    }
    //GET FARM BY AHLI
    public function fetch_by_farm(){
        $user = Auth::user();
        $farm = Farm::where('id_farm_manager', $user->id)->first();  
        $farms = DB::table('reports')->where('farm_id', $farm->id)->get()->toArray();
        return response()->json(['data' => $farms], $this-> successStatus);
    }


}