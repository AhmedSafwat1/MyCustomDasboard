<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->unique();
            $table->string('code')->nullable();
            $table->string('avatar')->default('default.png');
            $table->integer('active')->default(0);
            $table->integer('checked')->default(0);
            $table->integer('role')->default('0');
            $table->decimal('lat', 16,14)->nullable();
            $table->decimal('lng', 16,14)->nullable();
            $table->text('address')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        $user   = new \App\User;
        $user->name ="safwat";
        $user->email = "safwat@safwat.com";
        $user->phone = "01008634708";
        $user->password = bcrypt('111111');
        $user->active = 1;
        $user->role = 1;
        $user->save();
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
