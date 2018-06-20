<?php

namespace Modules\Pages\Entities;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    protected $fillable = [
        'slug', 'title', 'content',
    ];
}
