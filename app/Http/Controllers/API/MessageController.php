<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth;
use App\Events\MessagePusherEvent; 
class MessageController extends Controller 
{
    public $successStatus = 200;

    public function sendMessage(Request $request){
        broadcast(new MessagePusherEvent($request->name,$request->message));
        return response()->json(['success'=>'Event has been sent!'], $this-> successStatus); 
    }
}
