<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'Admin')->first();
        $role_user = Role::where('name', 'User')->first();

        $admin = new User();
        $admin->first_name = "Admin";
        $admin->last_name = "Administrator";
        $admin->username = "admin";
        $admin->email = "sitp.development@seiko-it.com.ph";
        $admin->password = bcrypt('jayr');
        $admin->profile_pic = '1.jpg';
        $admin->remember_token = "3e0ujMTu0dK8WQwYJ767niQ7CW5zrNX1h3F69C1MmBSyA5GtkKQenHYWK0AT";
        $admin->created_at = date("Y-m-d H:i:s");
        $admin->updated_at = date("Y-m-d H:i:s");
        $admin->save();
        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->first_name = "Jay-R A.";
        $user->last_name = "Magdaluyo";
        $user->username = "jayr";
        $user->email = "j.magdaluyo@seiko-it.com.ph";
        $user->password = bcrypt('123456');
        $user->profile_pic = '2.jpg';
        $user->created_at = date("Y-m-d H:i:s");
        $user->updated_at = date("Y-m-d H:i:s");
        $user->save();
        $user->roles()->attach($role_user);
    }
}
