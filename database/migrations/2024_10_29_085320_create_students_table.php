<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id(); 
            $table->string('student_id')->unique();
            $table->string('faculty');
            $table->string('departments');
            $table->string('current_semester');
            $table->year('enrollment_year');
            $table->year('current_year');
            $table->timestamps(); 
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            
            // $table->unsignedBigInteger('user_id')->uniqid();

        });
    }

    /** 
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
