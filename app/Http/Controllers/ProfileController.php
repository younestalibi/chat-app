<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Models\Profile;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function update_image(User $user)
    {
        // dd(request('image'));
        
        // dd($path);
        // if(file_exists())
       
        
        if(str_starts_with($user->profile->image, 'uploads/')){
            $path=public_path('/storage/'.$user->profile->image);
            if(file_exists($path)){
                unlink($path);
            }
           
        }
        
        $image=$user->profile->image=request('image')->store("uploads","public");
        $user->push();
        
        // unlink($path);
        // return redirect('home')->with('update_succeeded','You have changed your profile Image successfully!');
        // return 'You have changed your profile Image successfully!';
        return response()->json(['message' => $image,'update_succeeded'=>'You have changed your profile Image successfully!']);
    }
    public function update_name(User $user)
    {
        $user->name=request('name');
        $user->save();
        // return redirect('home')->with('update_succeeded','You have changed your profile UserName successfully!');
        return response()->json(['update_succeeded'=>'You have changed your profile UserName successfully!']);
    }
    public function update_status(User $user)
    {
        $user->profile->description=request('description');
        $user->push();
        // return redirect('home')->with('update_succeeded','You have changed your profile Status successfully!');
        return response()->json(['update_succeeded'=>'You have changed your profile Status successfully!']);
    }
    
}
