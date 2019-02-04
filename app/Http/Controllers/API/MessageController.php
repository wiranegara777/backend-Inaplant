<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use App\Message;
use Illuminate\Support\Facades\Auth;
use App\Events\MessagePusherEvent;
use Illuminate\Support\Facades\DB;

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
}
