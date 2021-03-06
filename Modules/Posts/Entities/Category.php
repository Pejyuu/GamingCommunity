<?php

namespace Modules\Posts\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'post_categories';

    protected $fillable = [
      'name', 'description'
    ];

    public function posts()
    {
        return $this->hasMany('Modules\Posts\Entities\Post');
    }
}
