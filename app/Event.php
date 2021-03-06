<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];

	protected $table = 'events';

    protected $fillable = ['name', 'type', 'active'];

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function rounds()
    {
        return $this->belongsToMany('App\Round')->withTimestamps();
    }

    public function results()
    {
        return $this->belongsToMany('App\Result')->withTimestamps();
    }

}
