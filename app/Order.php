<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $fillable=['user_id','product_id','status'];

    public function user()
    {
        return $this->belongsTo("App\User");
    }
    public function product()
    {
        return $this->belongsTo("App\Product");
    }
}
