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
use Illuminate\Support\Facades\Auth; 
use Validator;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller 
{
    public $successStatus = 200;

    public function postTask(Request $request){
        $validator = Validator::make($request->all(), [ 
            'title' => 'required',  
            'id_pemilik_lahan' => 'required', 
            'description' => 'required',
            'id_term' => 'required'
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);   
         } else {
             $input = $request->all();
             $farm = Task::create($input);
             return response()->json(['success'=>'success added new Task'], $this-> successStatus);
         }
    }

    //get list task
    public function getTasks($id_pemilik_lahan){
        $user = Auth::user();
        $id_farm_manager = $user->id;
        $check = DB::table('statustasks')->where('id_farm_manager', $id_farm_manager)->get()->toArray();
        if($check != NULL){
            $tasks = DB::table('tasks')->where('id_pemilik_lahan', $id_pemilik_lahan)->get();
            $sum = [];
            foreach($tasks as $task){
                $array_task =  (array) $task;
                $status = DB::table('statustasks')->where('id_task', $task->id)->first();
                $array_task['status'] = $status->status;
                array_push($sum,$array_task); 
            }
            return response()->json(['success' => $sum], $this-> successStatus);
        }else{
            $sum = 0;
            $tasks = DB::table('tasks')->where('id_pemilik_lahan', $id_pemilik_lahan)->get();
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
            return response()->json(['success' => $sum], $this-> successStatus);
        }
    }

    //detail task
    public function getDetailtask($id_task){
        $user = Auth::user();
        $id_farm_manager = $user->id;
        $task = DB::table('tasks')->where('id', $id_task)->first();
        $task = (array) $task;
        $status = DB::table('statustasks')->where([
            ['id_task','=', $id_task],
            ['id_farm_manager','=',$id_farm_manager]
            ])->first();
        $task['status'] = $status->status;

        return response()->json(['success' => $task], $this-> successStatus);
    }

    public function updateStatustask($id_task){
        $user = Auth::user();
        $id_farm_manager = $user->id;
        $status = DB::table('statustasks')->where([
            ['id_task','=', $id_task],
            ['id_farm_manager','=',$id_farm_manager]
            ])->first();
        $status = Statustask::find($status->id);
        $status->status = 1;
        $status->save();

        return response()->json(['success' => 'update status task success'], $this-> successStatus);
    }
}