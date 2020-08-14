<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Step extends Model
{
    protected $table='sub_steps';
    protected $fillable=['step_id','name'];

    public function step()
    {
        return $this->belongsTo("App\Step");
    }
}

