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

use Excel;
use App\Exports\LaporansExport;

class LaporanController extends Controller 
{
    public $successStatus = 200;

    public function postLaporan(Request $request){
        $user = Auth::user();
        if($user->id == 2){
            $id_farm_manager = $user->id;
            $validator = Validator::make($request->all(), [ 
                'name' => 'required',  
                'note' => 'required',
                'varietas' => 'required',
                'is_overdue' => 'required',
                'location' => 'required',
            ]);
            if ($validator->fails()) { 
                return response()->json(['error'=>$validator->errors()], 401);   
            } else {
                $input = $request->all();
                $input['id_farm_manager'] = $id_farm_manager;
                $Groupfarm = $user->Groupfarm()->first();
                $Group = Groupfarm::find($Groupfarm->id_group_farm);
                $id_pemilik_lahan = $Group->id_pemilik_lahan;
                $input['id_group_farm'] = $Groupfarm->id_group_farm;            
                $laporan = Laporan::create($input);
                $this->sendNotif($id_pemilik_lahan,$id_farm_manager);
                return response()->json(['success'=>'sukses tambah laporan'], $this-> successStatus);
            }
        }else{
            return response()->json(['error'=>'you are not logged in as farm manager!'], 401);
        }
    }

    public function getLaporans(){
        $user = Auth::user();
        if($user->role == 1){
            $groupfarm = DB::table('groupfarms')->where('id_pemilik_lahan', $user->id)->first();
            $laporans = DB::table('laporans')->where('id_group_farm', $groupfarm->id)->orderBy('id', 'DESC')->get();
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

    //fitur send notif laporan baru
    public function sendNotif($id_pemilik_lahan,$id_farm_manager){
        $pemilik_lahan = User::find($id_pemilik_lahan);
        $token = $pemilik_lahan->devicetoken;
        $serverKey = "AAAAH2esEZE:APA91bG_H69wYXS-b25BdNDJ5Bynqsexd_MABrubuFLr3Of1q2oqaQftiCiIw4-8ZK9aicaodKcavPnXB_gNNfXKOYu_ya6ZsHBGX-_ai0UtyEp446FI9ZnOiZHmNEZ2yOYFMqsoiUhD";
        $url = "https://fcm.googleapis.com/fcm/send";
        $farm_manager = User::find($id_farm_manager);
        $title = "Laporan baru dari ".$farm_manager->name." !";  
        $body = "Laporan Perkebunan";
        $notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1');
        $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
        $json = json_encode($arrayToSend);
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: key='. $serverKey;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
        //Send the request
        $response = curl_exec($ch);
        //Close request
        if ($response === FALSE) {
        die('FCM Send Error: ' . curl_error($ch));
        }
      //  return $ch;
        curl_close($ch);
        
    }

    //export CSV
    public function laporanExport($id_group_farm){
        return (new LaporansExport($id_group_farm))->download('laporan.xlsx');
    }


}