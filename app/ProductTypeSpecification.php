<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductTypeSpecification extends Model
{
    use SoftDeletes;

    public function ProductType()
    {
        return $this->belongsTo('App\ProductType', 'product_type_id');
    }
}
