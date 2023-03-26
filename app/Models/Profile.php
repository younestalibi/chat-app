<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\User;

class Profile extends Model
{
    use HasFactory;

    public function image_profile(){
        if(!$this->image){
            $this->image='default-images/profile.png';
            $this->save();
        }
        return 'storage/'.$this->image;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function followers()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function last_messages()
    {
        return $this->hasMany(Last_message::class);
    }

}
