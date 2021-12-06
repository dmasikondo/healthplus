<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

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
            $table->string('surname');
            $table->string('first_name');
            $table->string('slug')->unique();
            $table->string('national_id')->nullable()->unique();
            $table->string('phone_number')->nullable();
            $table->enum('sex',['male','female'])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->boolean('must_reset')->default(false);
            $table->boolean('is_suspended')->default(false);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });


               //insert the superadmin
        DB::table('users')->insert([
                ['surname' => 'masikondo', 'first_name'=>'dingani',
                    'slug'=>'masikondofee34478-6fb3-4254-ae20-eebd73e1665e',
                    'email' => 'dmasikondo@gmail.com',
                    'password' => '$2y$10$uoveofsv.nCfwRA7CyD8AOIzKdMMkeuBFIy2o6.1KrU.lwLUGoqDe',
                'created_at'=>now(),'updated_at'=>now()],
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
