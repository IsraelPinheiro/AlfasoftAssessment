<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('users')->delete();
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@contacts.com',
            'password' => Hash::make('admin'),
            'profile_id' => 1,
            'created_by' => 1
        ]);
        $this->command->info('User Administrator created');

        User::create([
            'name' => 'Manager',
            'email' => 'manager@contacts.com',
            'password' => Hash::make('manager'),
            'profile_id' => 2,
            'created_by' => 1
        ]);
        $this->command->info('User Manager created');

        User::create([
            'name' => 'Inactive',
            'email' => 'inactiver@contacts.com',
            'password' => Hash::make('manager'),
            'active' => false,
            'profile_id' => 2,
            'created_by' => 1
        ]);
        $this->command->info('User Inactive created');
    }
}
