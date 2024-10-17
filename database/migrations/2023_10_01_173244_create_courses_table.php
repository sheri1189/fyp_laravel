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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string("course_title")->unique();
            $table->string("course_degree");
            $table->longText("course_program");
            $table->string("course_status");
            $table->longText("course_description");
            $table->longText("course_picture");
            $table->longText("course_price");
            $table->longText("course_duration");
            $table->longText("course_benefits");
            $table->string("added_from");
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
