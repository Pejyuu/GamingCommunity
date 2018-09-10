<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $fillable = [];

    public function products()
    {
      return $this->belongsToMany('Modules\Shop\Entities\Product', 'product_variant');
    }
}
