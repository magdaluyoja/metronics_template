<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
	    $role_employee->name = 'Admin';
	    $role_employee->description = 'Administrator';
	    $role_employee->save();

        $role_user = new Role();
	    $role_user->name = 'User';
	    $role_user->description = 'Frontend User';
	    $role_user->save();
    }
}
