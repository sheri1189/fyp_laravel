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
        Schema::create('time__tables', function (Blueprint $table) {
            $table->id();
            $table->string("instructor");
            $table->string("degree");
            $table->string("program");
            $table->string("class");
            $table->string("book");
            $table->string("batch");
            $table->string("day");
            $table->string("start_time");
            $table->string("end_time");
            $table->string("added_from");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time__tables');
    }
};
