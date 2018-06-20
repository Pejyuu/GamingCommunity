<?php

namespace Modules\Posts\Entities;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'post_tags';
    protected $fillable = [];
}
