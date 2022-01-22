<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('profiles', function (Blueprint $table){
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable()->default(null);
            //Access Controll
            //User 
            $table->boolean('users_create')->default(false);    //Flag that controls if the user can create a new user entry
            $table->boolean('users_read')->default(false);      //Flag that controls if the user can access the users index page
            $table->boolean('users_update')->default(false);    //Flag that controls if the user can update an existing user entry
            $table->boolean('users_delete')->default(false);    //Flag that controls if the user can delete an existing user entry
            //Contacts
            $table->boolean('contacts_create')->default(false);    //Flag that controls if the user can create a new contact entry
            $table->boolean('contacts_update')->default(false);    //Flag that controls if the user can update an existing contact entry
            $table->boolean('contacts_delete')->default(false);    //Flag that controls if the user can delete an existing contact entry
            //Controll
            $table->timestamps();   //created_at and updated_at
            $table->softDeletes();  //deleted_at
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->unsigned()->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('profiles');
    }
}
