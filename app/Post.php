<?php

namespace App;


use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;
    protected $table='posts';
    protected $fillable=['title','slug','location','content','user_id','status'];

    public function user(){ //user_id olarak bulur
        return $this->belongsTo('App\User');
    }
    protected $appends=['small_image']; //snakecase  kelimeler altgr(_) ile birbirine bağlanır
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
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
}
