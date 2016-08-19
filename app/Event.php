<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

	protected $table = 'events';

    protected $fillable = ['name', 'active', ];

    function users()
    {
        return $this->belongsToMany('App\User');
    }

    function types()
    {
        return $this->belongsToMany('App\Type')->withTimestamps();
    }


}
