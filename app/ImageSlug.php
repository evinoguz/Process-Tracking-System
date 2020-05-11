<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageSlug extends Model
{
    protected $table='image_slugs';
    protected $fillable=[
        'name','imageable_id','imageable_type'
    ];
}
