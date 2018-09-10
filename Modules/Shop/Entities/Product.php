<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'colors', 'sizes', 'price', 'price_sale', 'pic1', 'pic2', 'pic3'];


    public function variants()
    {
      return $this->belongsToMany('Modules\Shop\Entities\Variant', 'product_variant');
    }

    public function options()
    {
      return $this->hasManyThrough(
        'Modules\Shop\Entities\Option',
        'Modules\Shop\Entities\Variant',
        'variant_id'
      );
    }




}
