<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1=Role::create(['name' =>'admin']);
        $role2=Role::create(['name' =>'developer']);
        $role3=Role::create(['name' =>'guest']);
        $role4=Role::create(['name' =>'premium']);
        Permission::create(['name'=>'prestar_libro']) ->syncRoles([$role4]);
        Permission::create(['name'=>'admin']) ->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.list_users']) ->syncRoles($role1);
        Permission::create(['name'=>'admin.list_projects'])->syncRoles([$role1,$role2,$role3]);
    }
}
