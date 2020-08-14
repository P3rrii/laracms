<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Roles seeding
        App\Role::create([
            'name' => 'administrator'
        ]);

        App\Role::create([
            'name' => 'author'
        ]);

        App\Role::create([
            'name' => 'subscriber'
        ]);

        //Categories Seeding
        App\Category::create([
            'name'=>'HTML5/CSS3'
        ]);

        App\Category::create([
            'name'=>'Php/Laravel'
        ]);

        App\Category::create([
            'name'=>'Javascript'
        ]);

    }
}
