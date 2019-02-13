<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use Validator;

class FirebaseController extends Controller
 
{
 
    public function index(Request $request){
    
    $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/laravel-1d7cd-firebase-adminsdk-n4svy-af3b97e542.json');
    
    $firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->withDatabaseUri('https://laravel-1d7cd.firebaseio.com/')
    ->create();
    $database = $firebase->getDatabase();
    $num1 = (int)$request->sender_id;
    $num2 = (int)$request->receive_id;
    if($num1 < $num2){
        $child = $request->sender_id.$request->receive_id;
    } else {
        $child = $request->receive_id.$request->sender_id;
    }
    $newpath = 'messages/'.$child;
    $date = date("Y-m-d H:i:s");
    $newPost = $database
    ->getReference($newpath)
        ->push([
        'message' => 'Contoh Chat Brosis!',
        'dateCreated' => $date
        ]);
    return response()->json(['success'=>$newpath], 200); 

    //$newPost->getKey(); // => -KVr5eu8gcTv7_AHb-3-
    
    //$newPost->getUri(); // => https://my-project.firebaseio.com/blog/posts/-KVr5eu8gcTv7_AHb-3-
    
    //$newPost->getChild('title')->set('Changed post title');
    
    //$newPost->getValue(); // Fetches the data from the realtime database
    
    //$newPost->remove();
    //echo"<pre>";
    //print_r($newPost->getvalue());
    
    }

    public function firestore(Request $request){

        $validator = Validator::make($request->all(), [ 
            'sender_id' => 'required', 
            'receive_id' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails()) { 
                return response()->json(['error'=>$validator->errors()], 401);            
            } else {
                date_default_timezone_set("Asia/Singapore");
                $date = date("Y-m-d H:i:s");
                $key = hash('md5',$date);
                $num1 = (int)$request->sender_id;
                $num2 = (int)$request->receive_id;
                if($num1 < $num2){
                    $message_id = $request->sender_id.$request->receive_id;
                } else {
                    $message_id = $request->receive_id.$request->sender_id;
                }
                $firestore_data  = [
                        "message" => ["stringValue" => $request->message],
                        "sender_id" => ["integerValue" => $request->sender_id],
                        "receive_id" => ["integerValue" => $request->receive_id],
                        "timestamp" => ["stringValue" => $date],
                    ];
                $data = ["fields" => (object)$firestore_data];
            
            //    Possible *value options are:
            //    stringValue
            //    doubleValue
            //    integerValue
            //    booleanValue
            //    arrayValue
            //    bytesValue
            //    geoPointValue
            //    mapValue
            //    nullValue
            //    referenceValue
            //    timestampValue
            
                $json = json_encode($data);
            
            // $Enter your firestore unique key: below is a sample
                $firestore_key = "AIzaSyCOUj4FqcUESnA3WR0JdAsaFsmI-Ki4g8M";
            #Provide your firestore project ID Here
                $project_id = "laravel-1d7cd";  
                
                $url = "https://firestore.googleapis.com/v1/projects/laravel-1d7cd/databases/(default)/documents/messages/".$message_id."/".$message_id."/".$key;
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_HTTPHEADER => array('Content-Type: application/json',
                        'Content-Length: ' . strlen($json),
                        'X-HTTP-Method-Override: PATCH'),
                    CURLOPT_URL => $url . '?key='.$firestore_key,
                    CURLOPT_USERAGENT => 'cURL',
                    CURLOPT_POSTFIELDS => $json
                ));
            
                $response = curl_exec( $curl );
            
                curl_close( $curl );
                
                if ($response === FALSE) {
                    die('FCM Send Error: ' . curl_error($ch));
                    } else {
                    return response()->json(['success'=>'success send message'], 200); 
                    }
                echo $response . "\n";
            
        }


        

    }
 
}


