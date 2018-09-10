<?php

namespace Modules\Events\Entities;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
      'title', 'slug', 'url', 'start', 'end', 'description', 'filepath', 'location'
    ];

    public function attending()
    {
      return $this->belongsToMany('App\User', 'event_user');
    }


}
