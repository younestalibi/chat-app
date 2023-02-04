<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Events\UserOnline;

class UserOnlineController extends Controller
{
    //
    public function online(User $id)
    {
        # code...
        $id->status='online';
        $id->save();
        broadcast(new UserOnline($id))->toOthers();;
    }

    public function offline(User $id)
    {
        # code...
        $id->status='offline';
        $id->save();
        broadcast(new UserOnline($id))->toOthers();;
    }
}
