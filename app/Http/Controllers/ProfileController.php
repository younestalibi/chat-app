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
        $user->profile->image=request('image')->store("uploads","public");
        $user->push();
        return redirect('home')->with('update_succeeded','You have changed your profile Image successfully!');
    }
    public function update_name(User $user)
    {
        $user->name=request('name');
        $user->save();
        return redirect('home')->with('update_succeeded','You have changed your profile UserName successfully!');
    }
    public function update_status(User $user)
    {
        $user->profile->description=request('description');
        $user->push();
        return redirect('home')->with('update_succeeded','You have changed your profile Status successfully!');
    }
    
}
