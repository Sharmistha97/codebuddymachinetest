<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('avater')->nullable();
            $table->tinyInteger('role')->default(1)->comment("1 = Admin,2 = User");
            $table->string('status')->default('active');
            $table->rememberToken();
            $table->timestamps();
        });
         
          // Insert some stuff
          $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'password' => Hash::make(123456),
                'role' => 1,
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'username' => 'user',
                'password' => Hash::make(123456),
                'role' => 2,
            ],
            //...
        ];

        DB::table('admins')->insert($data);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
