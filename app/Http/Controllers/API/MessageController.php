<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use App\Message;
use Illuminate\Support\Facades\Auth;
use App\Events\MessagePusherEvent;
use Illuminate\Support\Facades\DB;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class MessageController extends Controller 
{
    public $successStatus = 200;

    public function pusher(Request $request){
        broadcast(new MessagePusherEvent($request->name,$request->message));
        return response()->json(['success'=>'Message has been sent!'], $this-> successStatus); 
    }

    public function fetch(Request $request){
        //$messages = \App\Message::with('user')->get()->toArray();
        $messages = DB::table('messages')->where('message_id', $request->message_id)->get()->toArray();
        return response()->json(['data' => $messages], $this-> successStatus);
    }

    public function sentMessage(Request $request){
        $input = $request->all(); 
        $message = Message::create($input);
        return response()->json(['success'=>'Message has been sent!'], $this-> successStatus); 
    }

    public function sendNotif(){
        // $optionBuilder = new OptionsBuilder();
        // $optionBuilder->setTimeToLive(60*20);

        // $notificationBuilder = new PayloadNotificationBuilder('NOTIF DARI LARAVEL');
        // $notificationBuilder->setBody('JAV KAMPANK')
        //                     ->setSound('default');

        // $dataBuilder = new PayloadDataBuilder();
        // $dataBuilder->addData(['a_data' => 'my_data']);

        // $option = $optionBuilder->build();
        // $notification = $notificationBuilder->build();
        // $data = $dataBuilder->build();

        // $token = "ftawcwzFw8g:APA91bH14X-bN-hcAhmjsqA77cyTsLzwrgnXACWTBchBKXLT47VbnwUX_fyM0UKiMzYg7wVo1IshwUwDpMXNQGhMRKu7LEmEerGqFm4a_d0lfxquptW42z9-ANKDH3HAiOUDBTiaaEmA";

        // $downstreamResponse = FCM::sendTo($token, $option, $notification);
        // $response['number_sent'] = $downstreamResponse->numberSuccess();
        // $response['number_failed'] = $downstreamResponse->numberFailure();
        // $response['token']=$token;
        // return response()->json(['report'=> $response], $this-> successStatus); 



        // $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        // $token='ftawcwzFw8g:APA91bH14X-bN-hcAhmjsqA77cyTsLzwrgnXACWTBchBKXLT47VbnwUX_fyM0UKiMzYg7wVo1IshwUwDpMXNQGhMRKu7LEmEerGqFm4a_d0lfxquptW42z9-ANKDH3HAiOUDBTiaaEmA';
        
    
        // $notification = [
        //     'title'=>'nyobain notif!',
        //     'body' => 'JAV KAMPANK!',
        //     'sound' => true,
        // ];
        
        // $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];
    
        // $fcmNotification = [
        //     //'registration_ids' => $tokenList, //multple token array
        //     'to'        => $token, //single token
        //     'notification' => $notification,
        //     'data' => $extraNotificationData
        // ];
    
        // $headers = [
        //     'Authorization: key=AIzaSyAO87Mi_wofsEoaGaJ7a_sUhcwWTVgcnwM',
        //     'Content-Type: application/json'
        // ];
    
    
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        // $result = curl_exec($ch);
        // //Close request

        // if ($result === FALSE) {
        //     die('FCM Send Error: ' . curl_error($ch));
        //     return response()->json(['report'=> 'gagal'], 401); 
        // }else{
        //     return response()->json(['report'=> 'berhasil'], $this-> successStatus); 
        // }
        // curl_close($ch);
        
        $url = "https://fcm.googleapis.com/fcm/send";
        $token = "ftawcwzFw8g:APA91bH14X-bN-hcAhmjsqA77cyTsLzwrgnXACWTBchBKXLT47VbnwUX_fyM0UKiMzYg7wVo1IshwUwDpMXNQGhMRKu7LEmEerGqFm4a_d0lfxquptW42z9-ANKDH3HAiOUDBTiaaEmA";
        $serverKey = 'AAAAXRRZoeM:APA91bHQLsQVYBMC9BtFJ-_6w-I1hTu4zAB5EXkF-lUKd-kr89YTt9-OyBfZjp4kZ79EWmArkTj9aUbP0kmv-P-IEu4Mn-uGeiGO5u9KQDjpTFCv5uddrzAujkN9MSxLsxG0xe3ysaJs';
        $title = "NOTIF DARI LARAVEL";
        $body = "tes lagi";
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
        curl_close($ch);
    }
}
