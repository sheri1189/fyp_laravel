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
        Schema::create('test__schedules', function (Blueprint $table) {
            $table->id();
            $table->string("instructor")->nullable();
            $table->string("degree")->nullable();
            $table->string("program")->nullable();
            $table->string("class")->nullable();
            $table->string("book")->nullable();
            $table->string("batch")->nullable();
            $table->string("date")->nullable();
            $table->string("added_from")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test__schedules');
    }
};
