<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\User;

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
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('role',['Administrator','Receptionist'])->default('Receptionist');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });

        User::insert([
            'name'=>'Administrator',
            'username'=>'admin',
            'password'=>'$2y$10$LyN3VSpi0bUQZ7EYykYCNunKaVeRMapdYwdl61u9vySLuEfBU9ryK',
            'role'=>'Administrator',
        ]);
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
