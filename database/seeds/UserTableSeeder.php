<?php

use App\RoleUser;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name"=>"evin",
            "email"=>"evinoguz.b21@gmail.com" ,
            "password"=>bcrypt("12345678"), //şifrelenmiş bir şekilde saklar
        ]);
        RoleUser::create(["role_id"=>1,"user_id"=>1]);
        RoleUser::create(["role_id"=>2,"user_id"=>1]);
        RoleUser::create(["role_id"=>3,"user_id"=>1]);
    }
}
