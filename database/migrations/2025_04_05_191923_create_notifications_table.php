<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('message');
            $table->enum('target',['lecturers', 'students']);
            $table->unsignedBigInteger('sender_id');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
