<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        $this->call(ProfileSeeder::class);
        $this->call(UserSeeder::class);
        //Seeders to be run only on dev environment
        if(app()->environment('dev')){
            $this->call(ContactSeeder::class);
        }
        //Seeders to be run only on production environment
        if(app()->environment('production')){
            
        }
    }
}
