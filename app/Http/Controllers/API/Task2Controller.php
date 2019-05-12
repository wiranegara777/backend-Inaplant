<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\Farm;
use App\User; 
use App\Groupfarm;
use App\Term;
use App\Task2;
use App\Statustask;
use Illuminate\Support\Facades\Auth; 
use Validator;
use Illuminate\Support\Facades\DB;

class Task2Controller extends Controller 
{
    public $successStatus = 200;

    //fitur send notif laporan baru
    public function sendNotif($id_pemilik_lahan,$id_farm_manager){
        $farm_manager = User::find($id_farm_manager);
        $token = $farm_manager->devicetoken;
        $serverKey = "AAAAH2esEZE:APA91bG_H69wYXS-b25BdNDJ5Bynqsexd_MABrubuFLr3Of1q2oqaQftiCiIw4-8ZK9aicaodKcavPnXB_gNNfXKOYu_ya6ZsHBGX-_ai0UtyEp446FI9ZnOiZHmNEZ2yOYFMqsoiUhD";
        $url = "https://fcm.googleapis.com/fcm/send";
        $pemilik_lahan = User::find($id_pemilik_lahan);
        $title = "Task baru dari ".$pemilik_lahan->name." !";  
        $body = "Task Perkebunan";
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

    public function postTask(Request $request){
        $validator = Validator::make($request->all(), [ 
            'title' => 'required',  
            'id_pemilik_lahan' => 'required', 
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);   
         } else {
             $user = Auth::user();
             $id = $user->id;
             $Groupfarm = DB::table('groupfarms')->where('id_pemilik_lahan', $id)->first();
             $id_group_farm = $Groupfarm->id;
             $list_farmmanager =  DB::table('assignfarms')->where('id_group_farm', $id_group_farm)->get();
             foreach($list_farmmanager as $fm){
                $this->sendNotif($id ,$fm->id_farm_manager);
            }

             $input = $request->all();
             $farm = Task2::create($input);
             return response()->json(['success'=>'success added new Task'], $this-> successStatus);
         }
    }

    //get list task
    public function getTasks($id_pemilik_lahan){
        $user = Auth::user();
        if($user->role == 1){
            $tasks = DB::table('task2s')->where('id_pemilik_lahan', $id_pemilik_lahan)->get();
            if($tasks->isEmpty()){
                return response()->json(['error' => 'Tasks not found !'], 401);
            }else{
                return response()->json(['success' => $tasks], $this-> successStatus);
            }
        }else{
            $id_farm_manager = $user->id;
            $check = DB::table('statustasks')->where('id_farm_manager', $id_farm_manager)->get()->toArray();
            if($check != NULL){
                $tasks = DB::table('task2s')->where('id_pemilik_lahan', $id_pemilik_lahan)->get();
                $sum = [];
                foreach($tasks as $task){
                    $array_task =  (array) $task;
                   // $status = DB::table('statustasks')->where([
                    //    ['id_task','=', $task->id],
                     //   ['id_farm_manager','=',$id_farm_manager]
                      //  ])->first();
                   $status = DB::table('statustasks')->where('id_task', $task->id)->where('id_farm_manager', $id_farm_manager)->first();
                   if($status === NULL){
                        $statustask = new Statustask;
                        $statustask->id_farm_manager = $id_farm_manager;
                        $statustask->id_task = $task->id;
                        $statustask->status = 0;
                        $statustask->save();
                        $status = DB::table('statustasks')->where('id_task', $task->id)->where('id_farm_manager', $id_farm_manager)->first();
                   }
                    $array_task['status'] = $status->status;
                    array_push($sum,$array_task); 
                }
                if($sum == NULL){
                    return response()->json(['error' => 'Tasks not found !'], 401);
                }else{
                    return response()->json(['success' => $sum], $this-> successStatus);
                }
            }else{
                $sum = 0;
                $tasks = DB::table('task2s')->where('id_pemilik_lahan', $id_pemilik_lahan)->get();
                $sum=[];
                foreach ($tasks as $task){
                    $array_task =  (array) $task;
                    $array_task['status'] = 0;
                    array_push($sum, $array_task);

                    $statustask = new Statustask;
                    $statustask->id_farm_manager = $id_farm_manager;
                    $statustask->id_task = $task->id;
                    $statustask->status = 0;
                    $statustask->save();
                }
                if($sum == NULL){
                    return response()->json(['error' => 'Tasks not found !'], 401);
                }else{
                    return response()->json(['success' => $sum], $this-> successStatus);
                }      
            }
        }
        
    }

    //detail task
    public function getDetailtask($id_task){
        $user = Auth::user();
        $id_farm_manager = $user->id;
        if($user->role == 2){
            $task = DB::table('tasks')->where('id', $id_task)->first();
            $task = (array) $task;
            try {
            $status = DB::table('statustasks')->where([
                ['id_task','=', $id_task],
                ['id_farm_manager','=',$id_farm_manager]
                ])->first();
            }
            catch (\Exception $e) {
                $status=NULL;
              }
            if($status == NULL){
                return response()->json(['error' => 'task not found !'], 401);
            }else{
                $task['status'] = $status->status;
                return response()->json(['success' => $task], $this-> successStatus);
            }
        }else{
            return response()->json(['failed' => 'you are not logged in as farm manager'], 401);

        }
        
    }

    public function updateStatustask($id_task){
        $user = Auth::user();
        $id_farm_manager = $user->id;
        try {
            $status = DB::table('statustasks')->where([
                ['id_task','=', $id_task],
                ['id_farm_manager','=',$id_farm_manager]
                ])->first();
            }
            catch (\Exception $e) {
              $status=NULL;
            }
        if($status != NULL){
            $status = Statustask::find($status->id);
            $status->status = 1;
            $status->save();
            return response()->json(['success' => 'update status task success'], 401);
        }else{
            return response()->json(['error' => 'Task not found'], $this-> successStatus);
        }

    }

    //edit task by pemilik lahan
    public function editTaskPemiliklahan(Request $request, $id_task){
        $task = Task2::find($id_task);
            if($task != NULL){
                $task->update($request->only(['title','description','start_date','end_date']));
                return response()->json(['success' => $task], $this-> successStatus);
            }else{
                return response()->json(['error' => 'task not found !'], $this-> successStatus);
            } 
    }
}