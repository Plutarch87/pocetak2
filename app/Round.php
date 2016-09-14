<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Round extends Model{

    protected $fillable = ['scoreTotal'];

    public function event()
    {
        return $this->belongsToMany('App\Event');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function results()
    {
        return $this->belongsToMany('App\Result')->withTimestamps();
    }
}
