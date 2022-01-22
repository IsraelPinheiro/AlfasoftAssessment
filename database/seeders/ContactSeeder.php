<?php

namespace Database\Seeders;

use App\Models\Contact;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $faker = Factory::create('en');
        $max = rand(40, 70);
        for($i = 0; $i <= $max; $i++){
            Contact::create([
                'name' => $faker->name,
                'contact' => $faker->numerify('#########'),
                'email' => $faker->email,
                'created_by' => 1
            ]);
        }
        $this->command->info($max.' Test Contacts created');
    }
}
