<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('profiles')->truncate();
        Profile::create([
			'name' => 'Administrador',
			'description' => 'Default system administrator profile',
            'contacts_create' => true,
            'contacts_update' => true,
            'contacts_delete' => true,
            'users_create' => true,
            'users_read' => true,
            'users_update' => true,
            'users_delete' => true,
            'profiles_create' => true,
            'profiles_read' => true,
            'profiles_update' => true,
            'profiles_delete' => true,
            'created_by' => 1
        ]);
        $this->command->info('Administrator Profile Created');
        Profile::create([
			'name' => 'Manager',
			'description' => 'Default contacts manager profile ',
            'contacts_create' => true,
            'contacts_update' => true,
            'contacts_delete' => true,
            'users_create' => false,
            'users_read' => false,
            'users_update' => false,
            'users_delete' => false,
            'profiles_create' => false,
            'profiles_read' => false,
            'profiles_update' => false,
            'profiles_delete' => false,
            'created_by' => 1
        ]);
        $this->command->info('Administrator Profile Created');
    }
}
