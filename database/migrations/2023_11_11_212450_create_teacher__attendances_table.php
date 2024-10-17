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
        Schema::create('teacher__attendances', function (Blueprint $table) {
            $table->id();
            $table->string("teacher_id");
            $table->string("in_time");
            $table->string("out_time");
            $table->string("date");
            $table->string("attendance_status");
            $table->string("added_from");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher__attendances');
    }
};
