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
        
        // $name = $request->input('name');
        // $email = $request->input('email');
        // $image = $request->file('upload');
        // return ([
        // $request->image,
        // $request->message,
        // $request->to,
        // ]);

        // $message=new Message();
        // $message->user_id=1;
        // $message->reciver_id=3;
        // $message->message=request()->file('file');
        // $message->save();
        // event(new MessageEvent(1,'hello younes',2));
        // return [
        //     'data2'=>'done'
        // ];


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
        $user=auth()->user();
        $message=new Message();
        $image=null;
        $message_image=$request->message;
        $theMessage=$request->message;
        if(!is_null($request->image)){
            $image=$message->image=$request->image->store("Messages","public");
        }
        if(!is_null($request->image) && is_null($request->message) ){
            $message_image='sent an image 🖼';
            $theMessage='';
        }
        
        $message->user_id=auth()->user()->id;
        $message->reciver_id=$request->to;
        $message->message= $theMessage;
        $message->save();
       
        $last=Last_message::where('user_id',auth()->user()->id)->where('profile_id',$request->to)->first();
        if($last){
            $last->last_message= $message_image;
            $last->save();
        }else{
            $test=new Last_message();
            $test->user_id=auth()->user()->id;
            $test->profile_id=$request->to;
            $test->last_message= $message_image;
            $test->save();
        }
        $last1=Last_message::where('user_id',$request->to)->where('profile_id',auth()->user()->id)->first();
        if($last1){
            $last1->last_message= $message_image;
            $last1->save();
        }else{
            $test1=new Last_message();
            $test1->user_id=$request->to;
            $test1->profile_id=auth()->user()->id;
            $test1->last_message= $message_image;
            $test1->save();
        }
        $data='{"name":"'.$user->name.'","message_pend":"'.$message_image.'","id":"'.$user->id.'","email":"'.$user->email.'","status":"'.$user->status.'","description":"'. $user->profile->description .'","image":"'.$user->profile->image_profile().'"}';
        event(new MessageEvent($request->to, $theMessage,$image,auth()->user()->id,$data));


         $data2='{"name":"'.$user->name.'","to":"'.$request->to.'","message":"'. $message_image.'","message_image":"'.$image.'","id":"'.$user->id.'","email":"'.$user->email.'","status":"'.$user->status.'","description":"'. $user->profile->description .'","image":"'.$user->profile->image_profile().'"}';
         $friend=User::findOrFail($request->to);
         $data='{"name":"'.$friend->name.'","id":"'.$friend->id.'","email":"'.$friend->email.'","status":"'.$friend->status.'","description":"'.$friend->profile->description.'","image":"'.$friend->profile->image_profile().'"}';
        return(
            $data
        );

        
        
    }
    public function throwEvent(Request $request)
    {
        // ------------------------------------
        //this ajax request is for sending image if the old method doesn't work this is not best practice in case
        // ------------------------------------

        // $data='{"name":"'.$request->name.'","to":"'.$request->to.'","message":"'.$request->message.'","message_image":"'.$request->message_image.'","id":"'.$request->id.'","email":"'.$request->email.'","status":"'.$request->status.'","description":"'. $request->description .'","image":"'.$request->image.'"}';
        // event(new MessageEvent($request->to,$request->message,$image,auth()->user()->id,$data));
        // return 
        //     $data
        // ;
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
