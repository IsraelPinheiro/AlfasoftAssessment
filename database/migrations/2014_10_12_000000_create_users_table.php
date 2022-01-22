<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('active')->default(true);
            $table->string('password');
            //User permissions
            $table->boolean('can_create')->default(false);  //Flag that controls if the user can create a new entry
            $table->boolean('can_update')->default(false);  //Flag that controls if the user can update an existing entry
            $table->boolean('can_delete')->default(false);  //Flag that controls if the user can delete an existing entry
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
