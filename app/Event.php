<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];

	protected $table = 'events';

    protected $fillable = ['name', 'type', 'active'];

    function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function isActive()
    {
        if($this->active){
            return 'active';
        }
        else
        {
            return 'inactive';
        }
    }
}
