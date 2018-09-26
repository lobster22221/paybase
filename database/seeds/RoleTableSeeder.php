<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
    $role_employee->name = 'user';
    $role_employee->description = 'A standard User';
    $role_employee->save();
    $role_manager = new Role();
    $role_manager->name = 'admin';
    $role_manager->description = 'The webmaster of the site. Can create posts, add to all apps, and use the admin panel';
    $role_manager->save();
    }
}
