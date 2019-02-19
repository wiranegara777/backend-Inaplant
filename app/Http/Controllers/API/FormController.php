<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\Farm;
use App\User;
use App\Report; 
use App\Form;
use Illuminate\Support\Facades\Auth; 
use Validator;
use Illuminate\Support\Facades\DB;

class FormController extends Controller 
{
public $successStatus = 200;

/** 
     * Register farm api 
       */ 
    public function addForm(Request $request) { 
        $validator = Validator::make($request->all(), [ 
            'variabel1' => 'required', 
            'variabel2' => 'required',
        ]);
        if ($validator->fails()) { 
                    return response()->json(['error'=>$validator->errors()], 401);            
                } else {
                    $user = Auth::user();
                    $input = $request->all();
                    $input['id_ahlipraktisi'] = $user->id; 
                    $form = Form::create($input); 
                    return response()->json(['success'=>'success added new form'], $this-> successStatus); 
                }
    }
    //GET FARM BY AHLI
    public function getForm(){
        $user = Auth::user();
        $form = DB::table('forms')->where('id_ahlipraktisi', $user->id)->get()->toArray();
        return response()->json(['data' => $form], $this-> successStatus);
    }

    public function editForm(Request $request, $id){
        $form = Form::find($id);
        $form->variabel1 = $request->variabel1;
        $form->variabel2 = $request->variabel2;
        $response = $form->save();
        if ($response == true) {
            return response()->json(['success'=>'success update form'], $this-> successStatus); 
        } else {
            return response()->json(['error'=>'failed update'], 401);
        }
    }


}