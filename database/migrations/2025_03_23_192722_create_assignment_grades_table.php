<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assignment_grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('submission_id');
            $table->decimal('grade', 5, 2);
            $table->text('feedback')->nullable();
            $table->timestamps();

            $table->foreign('submission_id')->references('id')->on('submissions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignment_grades');
    }
};
