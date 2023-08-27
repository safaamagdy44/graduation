<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\MessageOneUserDetail;
use Illuminate\Http\Request;

class MessageOneUserDetailController extends Controller
{
    public function show($receiver_id){
        
        $messagesTrue = MessageOneUserDetail::where("receiver_id", $receiver_id) ->exists();
       if(!$messagesTrue){
           return response()->json([
           "msg" => "there are no messages for you yet ",
       ], 301);
       }else{
           
        //    $names= MessageOneUserDetail::where("receiver_id", $receiver_id)->distinct()->get('sender_name');
           $messages= MessageOneUserDetail::where("receiver_id", $receiver_id)->get();

           return view('showMessages',['messages'=>$messages]);
           
       }
    } // show all message request  
    public function show_chat(Request $request,$sender_id,$receiver_id){
            
        $messagesTrue = MessageOneUserDetail::where("receiver_id", $receiver_id)
        ->where("sender_id",$sender_id)
        ->exists();
       if(!$messagesTrue){
           return response()->json([
           "msg" => "there are no messages for you yet ",
       ], 301);
       }else{
           
           $messages= MessageOneUserDetail::where("receiver_id", $receiver_id)
           ->where("sender_id",$sender_id)
           ->get();
           return view('messages',['messages'=>$messages ,'student_id'->$receiver_id]);
           
       }
    } // show chat in one request
}
