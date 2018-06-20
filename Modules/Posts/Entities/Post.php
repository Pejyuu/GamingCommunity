<?php

namespace Modules\Posts\Entities;

use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
  protected $fillable = [
      'user_id', 'slug', 'title', 'content', 'filepath','tags', 'category_id',
  ];

  public function category()
  {
    return $this->belongsTo('Modules\Posts\Entities\Category');
  }

  public function author()
  {

    return $this->belongsTo('App\User', 'user_id');
  }
}
