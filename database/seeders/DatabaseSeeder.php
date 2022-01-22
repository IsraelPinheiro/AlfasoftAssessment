<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        $this->call(ProfileSeeder::class);
        $this->call(UserSeeder::class);
        //Seeders to be run only on local environment
        if(app()->environment('local')){
            $this->call(ContactSeeder::class);
        }
        //Seeders to be run only on production environment
        if(app()->environment('production')){
            
        }
    }
}
