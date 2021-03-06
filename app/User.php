<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'discord_id', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'discord_id', 'remember_token',
    ];


    public function posts()
    {
        return $this->hasMany('Modules\Posts\Entities\Post', 'id');
    }

    public function events()
    {
      return $this->belongsToMany('Modules\Events\Entities\Event', 'event_user');
    }


}
