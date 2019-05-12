<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use App\Farm;
use Illuminate\Support\Facades\Auth; 
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            $success['user'] = $user;
            $user['devicetoken'] = $request->devicetoken;
            $user['token_bearer'] = $success['token'];
            $user->save();
            return response()->json(['success' => $success], $this-> successStatus);
        } 
        else{ 
            return response()->json(['error'=>'Unauthorized'], 401); 
        } 
    }

    public function logout(){
        $user = Auth::user();
            $user->token_bearer = '';
            $user->devicetoken = "";
            $user->save();
            return response()->json(['success' => 'success logout and delete token'], $this-> successStatus);
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
        try{
            $users = DB::table('users')->where('role', $request->role)->get()->toArray();
        } catch (Exception $e) {
            $users = NULL;
        } 
        if($users != NULL){
            if($request->role == 2){
                $arr_farm_manager = [];
                foreach($users as $user){
                    $arr_user = (array) $user;
                    $check = DB::table('assignfarms')->where('id_farm_manager', $user->id)->get();
                    if($check->isEmpty()){
                        $arr_user['is_assigned'] = 0;
                    } else {
                        $arr_user['is_assigned'] = 1;
                    }
                array_push($arr_farm_manager,$arr_user);
                }
                $users = $arr_farm_manager;
            }
            return response()->json(['success' => $users], $this-> successStatus);
        }else{
            return response()->json(['error' => 'user not found !'], $this-> successStatus);
        }
    }

    public function getUserById(Request $request){
        $user = User::find($request->id);
        if($user == NULL){
            return response()->json(['error' => 'user not found !'], 401);
        }else{
            if ($user->role == 3){
                $komoditas = DB::table('komoditas')->where('id_ahlipraktisi', $user->id)->first();
                $user['komoditas'] = $komoditas->komoditas;
            }
            return response()->json(['data' => $user], $this-> successStatus); 
        }
        
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
            $imageName = strtolower($imageName);
            $imageName = '/'.$imageName;
            $image['image_path'] = 'http://api.inacrop.com/laravel/public/images'.$imageName;
            request()->image->move(public_path('images'), $imageName);
            return response()->json(['success' => $image], $this-> successStatus);
        }
        
    }

    //REGISTER AHLI PRAKTISI
    public function registerAhliPraktisi(Request $request){
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email|unique:users,email', 
            'password' => 'required', 
            'c_password' => 'required|same:password',
            'komoditas' => 'required'
        ]); 
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }else{
            $user = new \App\User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role = 3;
            $user->save();

            $komoditas = new \App\Komoditas(['komoditas' => $request->komoditas]);
            $user->komoditas()->save($komoditas);

            return response()->json(['success' => 'success register to Inagrow'], $this-> successStatus);
        }
    }

    //EDIT USER PROFILE 
    public function editUser(Request $request, $id){
            $user = User::find($id);
            if($user != NULL){
                $user->update($request->only(['name','email','no_hp','alamat']));
                if($request->hasFile('foto')) {
                    $imageName = time().'.'.request()->foto->getClientOriginalExtension();
                    $imageName = strtolower($imageName);
                    $imageName = '/'.$imageName;
                    $user->foto = 'http://api.inacrop.com/laravel/public/images'.$imageName;
                    request()->foto->move(public_path('images'), $imageName);
                    $user->save();
                }
                return response()->json(['success' => $user], $this-> successStatus);
            }else{
                return response()->json(['error' => 'user not found !'], $this-> successStatus);
            }    
    }

    //edit image profil user
    public function editImage(Request $request, $id){
        $validator = Validator::make($request->all(), [ 
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }else{
            $user = User::find($id);
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            $imageName = strtolower($imageName);
            $imageName = '/'.$imageName;
            $imageName = 'http://api.inacrop.com/laravel/public/images'.$imageName;
            request()->image->move(public_path('images'), $imageName);
            $user->foto = $imageName;
            $user->save();
            return response()->json(['success' => $imageName], $this-> successStatus);
        }
    }
    
    //Assign Farm Manager
    public function assignFarmManager(Request $request){
        $validator = Validator::make($request->all(), [ 
            'id_farm_manager' => 'required', 
            'id_group_farm' => 'required',        
        ]); 
        if ($validator->fails()){
            return response()->json(['error'=>$validator->errors()], 401);
        }else{
            $user = User::find($request->id_farm_manager);
            $assign = new \App\Assignfarm(['id_group_farm' => $request->id_group_farm]);
            $user->groupfarm()->save($assign);

            $farm = new \App\Farm;
            $farm->id_farm_manager = $user->id;
            $farm->save();

            return response()->json(['success' => 'success assign groupfarm !'], $this-> successStatus);
        }
    }

    //Register Farm Manager
    public function registerFarmManager(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);
        if ($validator->fails()) { 
                    return response()->json(['error'=>$validator->errors()], 401);            
                } else {
                    
                    //$user = User::create($input); 
                    $user = new \App\User;
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->password = bcrypt($request->password);
                    $user->role = 2;
                    $user->save();

                    // $farm = new \App\Farm;
                    // $farm->id_farm_manager = $user->id;
                    // $farm->save();
        
                    return response()->json(['success'=>'success added new farm manager'], $this-> successStatus); 
                }
        
    }

    //Register Pemilik Lahan
    public function registerPemilikLahan(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            'c_password' => 'required|same:password',
            'group_farm_name' => 'required',
            'komoditas' => 'required' 
        ]);
        if ($validator->fails()) { 
                    return response()->json(['error'=>$validator->errors()], 401);            
                } else {
                    
                    //$user = User::create($input); 
                    $user = new \App\User;
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->password = bcrypt($request->password);
                    $user->role = 1;
                    $user->save();

                    $farm = new \App\Groupfarm;
                    $farm->id_pemilik_lahan = $user->id;
                    $farm->komoditas = $request->komoditas;
                    $farm->name = $request->group_farm_name;
                    $farm->save();
        
                    return response()->json(['success'=>'success added new pemilik lahan '], $this-> successStatus); 
                }
        
    }

    //get list ahli praktisi
    public function getlistahli(){
        $ahlis = DB::table('users')->where('role', '3')->get();
        $sum = [];
        foreach($ahlis as $ahli){
            unset($ahli->password);
            unset($ahli->created_at);
            unset($ahli->updated_at);
            $array_ahli =  (array) $ahli;
            $komoditas = DB::table('komoditas')->where('id_ahlipraktisi', $ahli->id)->first();
            $array_ahli['komoditas'] = $komoditas->komoditas;
            array_push($sum,$array_ahli); 
        }
        return response()->json(['success'=> $sum], $this-> successStatus);
        
    }

}
