<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follwing extends Model
{
    public function followers()
    {
        //يعني كل يلي بعملهم فولو لهدا اليوزر 

        return $this->hasMany(User::class, "followee_id");
    }


    public function followees()
    { // يعني كل يلي عملولي فولو هدا اليوزر
        return $this->hasMany(User::class, "follower_id");
    }



}
