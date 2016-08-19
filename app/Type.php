<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model {

    protected $table = 'types';

    protected $fillable = [
        'name'
    ];
    /**
     * Get the users associated with the given role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function events()
    {
        return $this->belongsToMany('App\Event')->withTimestamps();
    }

}