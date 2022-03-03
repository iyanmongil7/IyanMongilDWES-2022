<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Sapatie\Permission\Models\Role;
use Sapatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1=Role::create(['name' =>'admin','display_name'=>'administrador']);
        $role2=Role::create(['name' =>'developer','display_name'=>'desarrollador']);
        $role3=Role::create(['name' =>'guest','display_name'=>'invitado']);
        Permission::create(['name'=>'admin']);
        Permission::create(['name'=>'admin.list_users']);
        Permission::create(['name'=>'admin.list_projects']);
    }
}
