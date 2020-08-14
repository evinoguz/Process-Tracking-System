<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees_Step extends Model
{
    protected $table='employees_steps';
    protected $fillable=['user_id','step_id','sub_step_id',];

    public function user()
    {
        return $this->belongsTo("App\User");
    }
    public function step()
    {
        return $this->belongsTo("App\Step");
    }
    public function sub_step()
    {
        return $this->belongsTo("App\Sub_Step");
    }

}
