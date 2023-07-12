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
        Schema::create('courses', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';

            $table->ulid('id')->primary();

            $table->foreignUlid('category_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUlid('teacher_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();

            $table->string('name');
            $table->string('small_description');
            $table->text('description');
            $table->integer('price');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
