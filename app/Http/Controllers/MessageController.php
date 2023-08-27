<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function form($sid,$rid){
        $messages=Messages::where('sender_id',$sid)->where('receiver_id',$rid)->get();
        return view('messages',['messages'=> $messages]);
    }
    public function send(Request $request, $sender_id ,$receiver_id){

        // $request->message=bcrypt($request->message);
            
             Messages::create([
                "sender_id" =>$sender_id ,
                "receiver_id" => $receiver_id,
                "message" => $request->message,
            ]);
            // return response()->json([
            //     "msg" => "تم ارسال الرساله بنجاح ",
            // ], 201);
            $messages=Messages::where('sender_id',$sender_id)->where('receiver_id',$receiver_id)->get();
        return view('messages',['messages'=> $messages]);
        }
       
                
            
            
             
        
}
