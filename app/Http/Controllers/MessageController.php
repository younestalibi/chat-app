<?php

namespace App\Http\Controllers;
use app\Models\User;
use App\Models\Message;
use App\Models\Profile;
use App\Models\Last_message;
use App\Events\MessageEvent;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    //

    public function test( Request $request)
    {
        
        $name = $request->input('name');
        $email = $request->input('email');
        $image = $request->file('upload');
        // $to = $request->input('to');
        // dd($request);
        return ([
        $request->image,
        $request->message,
        $request->to,
        ]);

        $message=new Message();
        $message->user_id=1;
        $message->reciver_id=3;
        $message->message=request()->file('file');
        $message->save();


    }



    public function send(Request $request)
    {
        // return(
        //     [
        //         $request->to,' ',
        //         $request->image,' ',
        //         $request->message
        //     ]
        // );
        $message=new Message();
        $image=null;
        if(!is_null($request->image)){
            $image=$message->image=$request->image->store("Messages","public");
        }
        
        $message->user_id=auth()->user()->id;
        $message->reciver_id=$request->to;
        $message->message=$request->message;
        $message->save();
       

        
        $user=auth()->user();
        $data='{"name":"'.$user->name.'","id":"'.$user->id.'","email":"'.$user->email.'","status":"'.$user->status.'","description":"'. $user->profile->description .'","image":"'.$user->profile->image_profile().'"}';
        event(new MessageEvent($request->to,$request->message,$image,auth()->user()->id,$data));
        $last=Last_message::where('user_id',auth()->user()->id)->where('profile_id',$request->to)->first();
        if($last){
            $last->last_message=$request->message;
            $last->save();
        }else{
            $test=new Last_message();
            $test->user_id=auth()->user()->id;
            $test->profile_id=$request->to;
            $test->last_message=$request->message;
            $test->save();
        }
        $last1=Last_message::where('user_id',$request->to)->where('profile_id',auth()->user()->id)->first();
        if($last1){
            $last1->last_message=$request->message;
            $last1->save();
        }else{
            $test1=new Last_message();
            $test1->user_id=$request->to;
            $test1->profile_id=auth()->user()->id;
            $test1->last_message=$request->message;
            $test1->save();
        }

        
        
    }

    public function getMessages($reciver_id)
    {

        $messages=Message::where('user_id','=',auth()->user()->id)
        ->where('reciver_id','=',$reciver_id)
        ->orwhere('user_id','=',$reciver_id)
        ->where('reciver_id','=',auth()->user()->id)
        ->get();
        if($messages->count()>0){
            return $messages;
        }
        else{
            return false;
        }
    }

    public function readMessage($profile)
    {
        $unread_Messages=Message::where('user_id','=',auth()->user()->id)
        ->where('reciver_id','=',$profile)
        ->where('message_status','=','unread')
        ->orwhere('user_id','=',$profile)
        ->where('reciver_id','=',auth()->user()->id)
        ->where('message_status','=','unread')
        ->get();
        $unread_Messages->transform(function ($message) {
            $message->message_status = 'read';
            $message->save();
        });
    }

    // public function deleteMessages($friend)
    // {
    //     // if(auth()->user()->following->contains($friend)){
    //     //     auth()->user()->following()->toggle($friend);
    //     //     return 'Messages is deleted';
    //     // }
    //     // else{
    //     //     return 'there is no message to delete';
    //     // }
    //     $messages=Message::where('user_id','=',auth()->user()->id)
    //     ->where('reciver_id','=',$friend)
    //     ->orwhere('user_id','=',$friend)
    //     ->where('reciver_id','=',auth()->user()->id)
    //     ->get();
    //     if($messages->count()>0){
    //         $messages->delete();
    //         return 'Messages is deleted';
    //     }
    //     else{
    //         return 'there is no message to delete';
    //     }

    // }
}
