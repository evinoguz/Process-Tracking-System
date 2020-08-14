<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=array(
            array("name"=>"manager"),
            array("name"=>"employees"),
            array("name"=>"customer"),

        );
        foreach ($roles as $role)
        {
            Role::create($role);

        }
    }
}
