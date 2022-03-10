<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $usuario = User::create([
           'name'=>'iyan',
           'email' => 'iyan@gmail.com',
           'email_verified_at'=>now(),
           'password' => Hash::make('iyan')
       ]);
       $usuario->assignRole('admin');
      
       $roles = Role::all();
       for($i=1; $i<10;){
           $rolename= $roles->random()->name;
           if($rolename!="admin"){
               User::factory()->create()->assignRole($rolename);
               $i++;
           }
       }
    }
}
