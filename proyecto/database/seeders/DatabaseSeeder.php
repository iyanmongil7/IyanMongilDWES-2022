<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * 
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create(
        [
            'name' => 'iyan',
            'email' => 'iyan@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
       \App\Models\User::factory(9)->create();
       \App\Models\Project::factory(10)->create();
    //$this->call(RoleTableSeeder::class);
       $this->seedRoles();
       $this->seedRelationRolesUser();
    }

    public function seedRoles()
    {
        
        $roles = [
            "admin"=>"administrador",
            "developer"=>"desarrollador",
            "guest"=>"invitado"
        ];

        foreach ($roles as $name => $display_name) {
            \App\Models\Role::create(compact('name','display_name'));
        }

    }

    public function seedRelationRolesUser()
    {

        $roles = \App\Models\Role::all();
        $users = \App\Models\User::all();


        $users[0]->roles()->attach(1);
 

        for ($i=1; $i<sizeof($users);) {
                $roleid=$roles->random()->id;
                if($roleid!=1){
                $users[$i]->roles()->attach($roleid);
                $i++;
            }
        }
        
    }
}
