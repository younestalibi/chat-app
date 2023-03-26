<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Events\UserOnline;

class UserOnlineController extends Controller
{
    //
    public function online($id)
    {
        # code...
        // dd('online');
        // dd($id);
        // dd('hi');
        $user=User::findOrFail($id);
        $user->status='online';
        $user->save();
        broadcast(new UserOnline($user))->toOthers();
        return 'online';
    }

    public function offline($id)
    {
        // dd('offline');
        # code...
        // dd('hi');
        $user=User::findOrFail($id);
        $user->status='offline';
        $user->save();
        broadcast(new UserOnline($user))->toOthers();
        return 'offline';
    }
}
