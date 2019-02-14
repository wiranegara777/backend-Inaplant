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

    public function sendNotif(Request $request){

        $token = "f0k5AlpOIKY:APA91bH5AroXgCAX0KlcC9qMn4E5AJDZIN36z8ilthxo2qWv_pdLGsLxxfI-IA3-Wn7mT54_ukl9Su1kIpfkQH37nUqXvSGl2haMev04fI8qJRqGcIyJOKusFQIzw0zGtTq8YHe8IS1G";
        //$token = $request->devicetoken
        $serverKey = "AAAAH2esEZE:APA91bG_H69wYXS-b25BdNDJ5Bynqsexd_MABrubuFLr3Of1q2oqaQftiCiIw4-8ZK9aicaodKcavPnXB_gNNfXKOYu_ya6ZsHBGX-_ai0UtyEp446FI9ZnOiZHmNEZ2yOYFMqsoiUhD";
        $url = "https://fcm.googleapis.com/fcm/send";
        //$token = "ftawcwzFw8g:APA91bH14X-bN-hcAhmjsqA77cyTsLzwrgnXACWTBchBKXLT47VbnwUX_fyM0UKiMzYg7wVo1IshwUwDpMXNQGhMRKu7LEmEerGqFm4a_d0lfxquptW42z9-ANKDH3HAiOUDBTiaaEmA";
        //$serverKey = 'AAAAXRRZoeM:APA91bHQLsQVYBMC9BtFJ-_6w-I1hTu4zAB5EXkF-lUKd-kr89YTt9-OyBfZjp4kZ79EWmArkTj9aUbP0kmv-P-IEu4Mn-uGeiGO5u9KQDjpTFCv5uddrzAujkN9MSxLsxG0xe3ysaJs';
        //$token = 'd2KHiwc17h0:APA91bH9NpAIjx9HkjQPj5EjOXsXaxGQMGMNAzzIUFzQSTb0DcVxIYwWmmE7uaAWD9yH125MvaCvX8pj4vcbLWGAXbh5XwwcgVIeEuukPDMKJFqlWUUPniqlBduIGAuRAsRx5lKuxuGh';
       // $serverKey = 'AAAAbN4PyRo:APA91bEzIxHOTn8Y8qMlZzyEsWz_Her4hsKOFbDgjOiqBR_OvhnvgOvEXwttynju9YykHgZ2pQET7UzEoSnuM2BAvmn0dpQ6s6moESqBJEb12WTcPEJtajCLoEzE3ofy6SCWjDVOOhO1';
        $title = "NOTIF DARI LARAVEL";  
        $body = "tes ganti firebase";
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
      //  if ($response === FALSE) {
      //  die('FCM Send Error: ' . curl_error($ch));
      //  }
        curl_close($ch);
    }
}
