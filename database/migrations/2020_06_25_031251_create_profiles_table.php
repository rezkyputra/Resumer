<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('hobby');
            $table->enum('gender', ['male', 'female']);
            $table->string('country');
            $table->text('summary');
            $table->text('address')->nullable();
            $table->string('img')->nullable();
            $table->string('placeOfBirth');
            $table->date('dateOfBirth');
            $table->string('linkGit')->nullable();
            $table->string('linkFace')->nullable();
            $table->string('linkLinked')->nullable();
            $table->string('linkTwitter')->nullable();
            $table->integer('userId')->unsigned();
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('profiles');
    }
}
