<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\Farm;
use App\User; 
use App\Groupfarm;
use App\Term;
use App\Task;
use App\Statustask;
use App\Laporan;
use App\Varietas;
use Illuminate\Support\Facades\Auth; 
use Validator;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller 
{
    public $successStatus = 200;

    public function postLaporan(Request $request){
        $user = Auth::user();
        $id_farm_manager = $user->id;
        $validator = Validator::make($request->all(), [ 
            'name' => 'required',  
            'note' => 'required',
            'varietas' => 'required',
            'is_overdue' => 'required'
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);   
         } else {
             $input = $request->all();
             $input['id_farm_manager'] = $id_farm_manager;
             $Groupfarm = $user->Groupfarm()->first();
             $input['id_group_farm'] = $Groupfarm->id_group_farm;
            if($request->hasFile('foto1')) {
                $imageName = time().'.'.request()->foto1->getClientOriginalExtension();
                $imageName = strtolower($imageName);
                $imageName = '/'.$imageName;
                $input['foto1'] = 'http://api.inacrop.com/laravel/public/images'.$imageName;
                request()->foto1->move(public_path('images'), $imageName);
            }
            if($request->hasFile('foto2')) {
                $imageName = time().'.'.request()->foto2->getClientOriginalExtension();
                $imageName = strtolower($imageName);
                $imageName = '/'.$imageName;
                $input['foto2'] = 'http://api.inacrop.com/laravel/public/images'.$imageName;
                request()->foto2->move(public_path('images'), $imageName);
            }
            if($request->hasFile('foto3')) {
                $imageName = time().'.'.request()->foto3->getClientOriginalExtension();
                $imageName = strtolower($imageName);
                $imageName = '/'.$imageName;
                $input['foto3'] = 'http://api.inacrop.com/laravel/public/images'.$imageName;
                request()->foto3->move(public_path('images'), $imageName);
            }
             
             $laporan = Laporan::create($input);
             return response()->json(['success'=>'success added new Laporan'], $this-> successStatus);
         }
    }

    public function getLaporans(){
        $user = Auth::user();
        if($user->role == 1){
            $groupfarm = DB::table('groupfarms')->where('id_pemilik_lahan', $user->id)->first();
            $laporans = DB::table('laporans')->where('id_group_farm', $groupfarm->id)->get();
            $sum = [];
            foreach($laporans as $laporan){
                $array_laporan =  (array) $laporan;
                $user = User::find($laporan->id_farm_manager);
                $varietas = Varietas::find($laporan->varietas);
                $array_laporan['farmmanager'] = $user;
                $array_laporan['varietas'] = $varietas->name;
                array_push($sum,$array_laporan); 
            }
            if($sum == NULL){
                return response()->json(['failed' => 'pemilik lahan tidak memiliki laporan !'], 401);
            }else{
                return response()->json(['success' => $sum], $this-> successStatus);
            }     
        }else{
            return response()->json(['failed'=>'you are not logged in as pemilik lahan'], 401);
        }
    }

    public function getDetaillaporan($id_laporan){
        $user = Auth::user();
        $laporan = DB::table('laporans')->where('id', $id_laporan)->first();
        if($laporan == NULL){
            return response()->json(['failed'=>'laporan not found !'], 401);
        }else{
            $user = User::find($laporan->id_farm_manager);
            $varietas = Varietas::find($laporan->varietas);
            $laporan = (array) $laporan;
            $laporan['farmmanager'] = $user;
            $laporan['varietas'] = $varietas->name;

            return response()->json(['success' => $laporan], $this-> successStatus);
        }
    }

}