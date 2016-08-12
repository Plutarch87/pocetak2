<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    protected $table = 'roles';

    protected $fillable = [
        'name'
    ];
    /**
     * Get the users associated with the given role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
	{
	    return $this->belongsToMany('App\User')->withTimestamps();
	}

}
