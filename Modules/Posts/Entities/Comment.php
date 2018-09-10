<?php

namespace Modules\Posts\Entities;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

  protected $fillable = [
      'user_id', 'post_id', 'comment', 'moderation'
  ];

    public function post()
    {
      return $this->belongsTo('Modules\Posts\Entities\Post', 'post_id');
    }

    public function author()
    {
      return $this->belongsTo('App\User', 'user_id');
    }

}
