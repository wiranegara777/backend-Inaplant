<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller 
{
public $successStatus = 200;
/** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(Request $request){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            if($user['devicetoken'] != null){
                return response()->json(['error' => 'devicetoken is not null'], 401); 
            } else {
                $success['token'] =  $user->createToken('MyApp')-> accessToken; 
                $success['user'] = $user;
                $user['devicetoken'] = $request->devicetoken;
                $user->save();
                return response()->json(['success' => $success], $this-> successStatus);
            }
        } 
        else{ 
            return response()->json(['error'=>'Unauthorized'], 401); 
        } 
    }

    public function logout(Request $request){
        $user = Auth::user();
        if ($user->devicetoken == $request->devicetoken){
            $user->devicetoken = '';
            $user->save();
            return response()->json(['success' => 'success delete devicetoken'], $this-> successStatus);
        } else {
            return response()->json(['error' => 'devicetoken not same'], 401); 
        }
    }
/** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            'c_password' => 'required|same:password',
            'role' => 'required', 
        ]);
        if ($validator->fails()) { 
                    return response()->json(['error'=>$validator->errors()], 401);            
                } else {
                    $input = $request->all(); 
                    $input['password'] = bcrypt($input['password']); 
                    $user = User::create($input); 
                    //$success['token'] =  $user->createToken('MyApp')-> accessToken; 
                    //$success['name'] =  $user->name;
                    return response()->json(['success'=>'success added new user'], $this-> successStatus); 
                }
        
    }

    //GET LIST USER BY ROLE
    public function getUsers(Request $request){
        //$messages = \App\Message::with('user')->get()->toArray();
        $users = DB::table('users')->where('role', $request->role)->get()->toArray();
        return response()->json(['data' => $users], $this-> successStatus);
    }

    public function getUserById(Request $request){
        $user = User::find($request->id);
        return response()->json(['data' => $user], $this-> successStatus); 
    }

/** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function details() 
    { 
        $user = Auth::user(); 
      //  if($user->role == "2"){
        return response()->json(['success' => $user], $this-> successStatus); 
     //   } else {
       //     return response()->json(['error'=>'Unauthorized'], 401); 
  //      }
    }
    //image upload
    public function uploadImage(Request $request){
        $validator = Validator::make($request->all(), [ 
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }else{
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            $imageName = '/'.$imageName;
            $image['image_path'] = 'api.inagrow.com/images'.$imageName;
            request()->image->move(public_path('images'), $imageName);
            return response()->json(['success' => $image], $this-> successStatus);
        }
        
    }
}
