<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Course;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('subtitle');
            $table->text('description');
            $table->enum('status', [Course::DRAFT, Course::REVIEWING, Course::PUBLISHED])->default(Course::DRAFT);
            $table->string('slug');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('level_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('price_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('level_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('price_id')->references('id')->on('users')->onDelete('set null');
            
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
