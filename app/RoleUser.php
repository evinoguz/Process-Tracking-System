<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    public $timestamps=true;
    protected $table='role_users';
    protected $fillable=['role_id','user_id'];

    public function user(){ //user_id olarak bulur
        return $this->belongsTo('App\User');
    }
    public function role(){
        return $this->belongsTo('App\Role');
    }
}
