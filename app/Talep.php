<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talep extends Model
{
    protected $table='taleps';
    protected $fillable=['user_id','explanation'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
