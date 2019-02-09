<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\Schedule;
use Illuminate\Support\Facades\Auth; 
use Validator;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller 
{
public $successStatus = 200;

/** 
     * Register farm api 
       */ 
    public function addSchedule(Request $request) { 
        $validator = Validator::make($request->all(), [ 
            'farm_id' => 'required', 
            'task' => 'required',
            'description' => 'required', 
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        if ($validator->fails()) { 
                    return response()->json(['error'=>$validator->errors()], 401);            
                } else {
                   // $input = $request->all(); 
                    $imageName = time().'.'.request()->image->getClientOriginalExtension();
                    request()->image->move(public_path('images'), $imageName);
                    $input['farm_id']=$request->farm_id;
                    $input['task']=$request->task;
                    $input['description']=$request->description;
                    $input['status']=0;
                    $input['image']='images/'.$imageName;
                   
                    $schedule = Schedule::create($input); 
                    return response()->json(['success'=>'success added new Schedule'], $this-> successStatus); 
                }
    }
    


}