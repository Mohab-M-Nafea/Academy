<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('course_student', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->ulid('id')->unique()->default(\Illuminate\Support\Str::ulid());

            $table->foreignUlid('course_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUlid('student_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();

            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();

            $table->primary(['course_id', 'student_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_student');
    }
};
