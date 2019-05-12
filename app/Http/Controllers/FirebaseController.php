<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth; 
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

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
    $num2 = (int)$request->receiver_id;
    if($num1 < $num2){
        $child = $request->sender_id.$request->receiver_id;
    } else {
        $child = $request->receiver_id.$request->sender_id;
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

    public function sendNotif($type,$id,$sender_id,$message){
        $user = User::find($id);
       // $token = "f0k5AlpOIKY:APA91bH5AroXgCAX0KlcC9qMn4E5AJDZIN36z8ilthxo2qWv_pdLGsLxxfI-IA3-Wn7mT54_ukl9Su1kIpfkQH37nUqXvSGl2haMev04fI8qJRqGcIyJOKusFQIzw0zGtTq8YHe8IS1G";
        $token = $user->devicetoken;
        $serverKey = "AAAAH2esEZE:APA91bG_H69wYXS-b25BdNDJ5Bynqsexd_MABrubuFLr3Of1q2oqaQftiCiIw4-8ZK9aicaodKcavPnXB_gNNfXKOYu_ya6ZsHBGX-_ai0UtyEp446FI9ZnOiZHmNEZ2yOYFMqsoiUhD";
        $url = "https://fcm.googleapis.com/fcm/send";
        //$token = "ftawcwzFw8g:APA91bH14X-bN-hcAhmjsqA77cyTsLzwrgnXACWTBchBKXLT47VbnwUX_fyM0UKiMzYg7wVo1IshwUwDpMXNQGhMRKu7LEmEerGqFm4a_d0lfxquptW42z9-ANKDH3HAiOUDBTiaaEmA";
        //$serverKey = 'AAAAXRRZoeM:APA91bHQLsQVYBMC9BtFJ-_6w-I1hTu4zAB5EXkF-lUKd-kr89YTt9-OyBfZjp4kZ79EWmArkTj9aUbP0kmv-P-IEu4Mn-uGeiGO5u9KQDjpTFCv5uddrzAujkN9MSxLsxG0xe3ysaJs';
        //$token = 'd2KHiwc17h0:APA91bH9NpAIjx9HkjQPj5EjOXsXaxGQMGMNAzzIUFzQSTb0DcVxIYwWmmE7uaAWD9yH125MvaCvX8pj4vcbLWGAXbh5XwwcgVIeEuukPDMKJFqlWUUPniqlBduIGAuRAsRx5lKuxuGh';
       // $serverKey = 'AAAAbN4PyRo:APA91bEzIxHOTn8Y8qMlZzyEsWz_Her4hsKOFbDgjOiqBR_OvhnvgOvEXwttynju9YykHgZ2pQET7UzEoSnuM2BAvmn0dpQ6s6moESqBJEb12WTcPEJtajCLoEzE3ofy6SCWjDVOOhO1';
        $sender = User::find($sender_id);
        if($type == 0){
            $title = "New Message from ".$sender->name." !";  
            $body = $message;
        }else{
            $title = " ".$sender->name." has send an image !";  
            $body = "image.jpg";
        }
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

    public function firestore(Request $request){

        $validator = Validator::make($request->all(), [ 
            'sender_id' => 'required', 
            'receiver_id' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails()) { 
                return response()->json(['error'=>$validator->errors()], 401);            
            } else {
                date_default_timezone_set("Asia/Jakarta");
                $date = date("Y-m-d H:i:s");
                $date2 = date_create();
                $key = date_timestamp_get($date2);
                $num1 = (int)$request->sender_id;
                $num2 = (int)$request->receiver_id;
                $check1 = User::find($num1);
                if($check1->role == 3){
                    $ahli = $num1;
                    $farm = $num2;
                } else {
                    $ahli = $num2;
                    $farm = $num1;
                }
                $message_id = $farm.'-'.$ahli;   
                $firestore_data  = [
                        "message" => ["stringValue" => $request->message],
                        "sender_id" => ["integerValue" => $request->sender_id],
                        "receiver_id" => ["integerValue" => $request->receiver_id],
                        "timestamp" => ["stringValue" => $date],
                        "type" => ["integerValue" => $request->type]
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
                
                //$url = "https://firestore.googleapis.com/v1/projects/laravel-1d7cd/databases/(default)/documents/messages/".$message_id."/".$message_id."/".$key;
                $url = "https://firestore.googleapis.com/v1beta1/projects/laravel-1d7cd/databases/(default)/documents/messages/".$message_id;
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_HTTPHEADER => array('Content-Type: application/json',
                        'X-HTTP-Method-Override: PATCH'),
                    CURLOPT_URL => $url . '?key='.$firestore_key,
                    CURLOPT_USERAGENT => 'cURL',
                    CURLOPT_POSTFIELDS => $json
                ));
            
                $response = curl_exec( $curl );
            
                curl_close( $curl );

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
                    $this->sendNotif(0,$request->receiver_id,$request->sender_id,$request->message);
                   // $respont['respond'] = $respond;
                    //$respont['key'] = $key;
                    //return response()->json(['status'=>$respond],200);
                    //return response()->json(['success'=>$key], 200); 
                    }
                echo $response . "\n";
                
        }


        

    }

    // BATESSSS

    public function photomsg(Request $request){

        $validator = Validator::make($request->all(), [ 
            'sender_id' => 'required', 
            'receiver_id' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails()) { 
                return response()->json(['error'=>$validator->errors()], 401);            
            } else {
                date_default_timezone_set("Asia/Jakarta");
                $date = date("Y-m-d H:i:s");
                $date2 = date_create();
                $key = date_timestamp_get($date2);
                $num1 = (int)$request->sender_id;
                $num2 = (int)$request->receiver_id;
                $check1 = User::find($num1);
                if($check1->role == 3){
                    $ahli = $num1;
                    $farm = $num2;
                } else {
                    $ahli = $num2;
                    $farm = $num1;
                }
                $message_id = $farm.'-'.$ahli;   
                $firestore_data  = [
                        "message" => ["stringValue" => $request->message],
                        "sender_id" => ["integerValue" => $request->sender_id],
                        "receiver_id" => ["integerValue" => $request->receiver_id],
                        "timestamp" => ["stringValue" => $date],
                        "type" => ["integerValue" => $request->type]
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
                
                //$url = "https://firestore.googleapis.com/v1/projects/laravel-1d7cd/databases/(default)/documents/messages/".$message_id."/".$message_id."/".$key;
                $url = "https://firestore.googleapis.com/v1beta1/projects/laravel-1d7cd/databases/(default)/documents/messages/".$message_id;
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_HTTPHEADER => array('Content-Type: application/json',
                        'X-HTTP-Method-Override: PATCH'),
                    CURLOPT_URL => $url . '?key='.$firestore_key,
                    CURLOPT_USERAGENT => 'cURL',
                    CURLOPT_POSTFIELDS => $json
                ));
            
                $response = curl_exec( $curl );
            
                curl_close( $curl );

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
                    $this->sendNotif(1,$request->receiver_id,$request->sender_id,$request->message);
                   // $respont['respond'] = $respond;
                    //$respont['key'] = $key;
                    //return response()->json(['status'=>$respond],200);
                    //return response()->json(['success'=>$key], 200); 
                    }
                echo $response . "\n";
                
        }


        

    }
    //END
 
}