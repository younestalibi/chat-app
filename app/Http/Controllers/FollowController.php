<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;

class FollowController extends Controller
{
    //
    public function follow(Profile $profile)
    {
        auth()->user()->following()->toggle($profile->id);
    }
    public function checkFollow(Profile $profile)
    {
        if(auth()->user()->following->contains($profile)){
            return true;
        }
    }
    public function unfriend($friend)
    {
        $user=User::findOrfail($friend);
        if(auth()->user()->following->contains($user->id)){
            auth()->user()->following()->toggle($user->id);
            return 'You have Unfriend with '.$user->name;
        }
        else{
            return 'You are already not friend with '.$user->name;
        }
    }
}
