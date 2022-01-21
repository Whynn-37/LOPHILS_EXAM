<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('employee_number')->unique();
            $table->string('password');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('photo')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('position')->nullable();
            $table->string('status')->nullable();
            $table->string('section')->nullable();
            // $table->string('section_code')->nullable();
            // $table->integer('area_id')->nullable();
            // $table->integer('user_type_id')->nullable();
            // $table->string('process')->nullable();
            // $table->integer('approver')->nullable();
            // $table->integer('support')->nullable();
            // $table->integer('receiver')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
