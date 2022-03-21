<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Libro;

class DatabaseSeeder extends Seeder
{
    
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        Libro::create([
            'nombre'=>'Harry Potter',
            'autor'=>'J.K Rowling',
            'editorial'=>'Salamandra ABC',
            'año'=>'1997',
            'imagen'=>'harry.jpg'
        ]);

        Libro::create([
            'nombre'=>'El señor de los anillos',
            'autor'=>'J.R.R. Tolkien',
            'editorial'=>'Minorauto',
            'año'=>'1995',
            'imagen'=>'anillos.jpg'
        ]);
        
        Libro::create([
            'nombre'=>'Los juegos del hambre',
            'autor'=>'Suzanne Collins',
            'editorial'=>'Scholastic Corporation',
            'año'=>'2012',
            'imagen'=>'harry.jpg'
        ]);
        Libro::create([
            'nombre'=>'Las cronicas de narnia',
            'autor'=>'C S. Lewis',
            'editorial'=>'Planeta',
            'año'=>'1950',
            'imagen'=>'harry.jpg'
        ]);
        Libro::create([
            'nombre'=>'The wicther: El ultimo deseo',
            'autor'=>'Andrezej Sapkowski',
            'editorial'=>'Coleccionista',
            'año'=>'2002',
            'imagen'=>'harry.jpg'
        ]);
        Libro::create([
            'nombre'=>'Assassin Creed',
            'autor'=>'Oliver Bowden',
            'editorial'=>'Minorauto',
            'año'=>'2021',
            'imagen'=>'harry.jpg'
        ]);
    }
}
