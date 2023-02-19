<?php

namespace App\Http\Controllers;
use app\Models\User;
use App\Models\Message;
use app\Models\Profile;



use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $messages=Message::where('user_id',1)->paginate(5);
        // foreach ($messages as $key) {
        //    dd($key);
        // }
        // dd($messages);
        return view('home');
    }
    public function search($name)
    {
        // $user=User::where('name', 'LIKE', '%'. $name .'%')->get();
        $user = User::
        select("profiles.image","profiles.description","users.id","users.name","users.email")
            ->join('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('name', 'LIKE', '%'. $name .'%')->get();
        if($user){
            // dd($user);
            return $user;
        }else{
            return 'hello';
        }
    }
    public function mode(Request $request)
    {
       $user=auth()->user();
       $user->mode=$request->mode;
       $user->save();
    //    return 'hell';
    }
    




    
}
