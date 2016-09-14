<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model {

	protected $fillable = [
	    'scoreTotal',
        'matches',
        'sets',
        'points',
        'wins',
        'loss',
        'draw',
    ];

    public function events()
    {
        return $this->belongsToMany('App\Event');
    }

    public function round()
    {
        return $this->belongsToMany('App\Round');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
