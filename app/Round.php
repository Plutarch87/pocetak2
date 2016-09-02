<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Round extends Model{

    public function event()
    {
        return $this->belongsToMany('App\Event');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
