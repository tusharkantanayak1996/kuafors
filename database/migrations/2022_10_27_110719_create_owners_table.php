<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('business_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('abn')->nullable();
            $table->string('years_of_operation')->nullable();
            $table->string('website')->nullable();
            $table->string('specialize_in')->nullable();
            $table->string('insurance')->nullable();
            $table->string('image')->nullable();
            $table->string('instagram_links')->nullable();
            $table->string('facebook_links')->nullable();
            $table->string('pinterest_links')->nullable();
            $table->string('linkedin_links')->nullable();
            $table->enum('type',['hair','beauty','both'])->nullable();
            $table->enum('status',['enable','disable'])->default('enable');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('auth_type')->default('owner');;
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('owners');
    }
}
