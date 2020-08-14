<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use Sluggable;
    protected $table='products';
    protected $fillable=['name','slug','content','price','step_id'];

    protected $appends=['small_image']; //snakecase  kelimeler altgr(_) ile birbirine bağlanır
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function image_slugs()
    {
        return $this->morphOne('App\ImageSlug','imageable');
    }
    public function getSmallImageAttribute() //camelcase-> kelimeler bitişik ilk harfleri büyük
    {
        $image=asset('uploads\thumb_'.$this->image_slugs()->first()->name);
        return '<img src="'.$image.'" class="img-thumbnail" width="150" />';
    }
    public function step()
    {
        return $this->belongsTo("App\Step");
    }
}
