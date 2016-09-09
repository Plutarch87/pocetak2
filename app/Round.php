<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Round extends Model{

    protected $fillable = ['scoreTotal'];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
