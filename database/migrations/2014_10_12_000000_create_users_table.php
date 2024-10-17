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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('registeration_no')->nullable();
            $table->string('degree')->nullable();
            $table->string('program')->nullable();
            $table->string('session')->nullable();
            $table->string('class')->nullable();
            $table->string('name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('start_date')->nullable();
            $table->string('cnic')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->unique()->nullable();
            $table->string('email_verified_at')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('gender')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('student_status')->nullable();
            $table->string('batch')->nullable();
            $table->string('address')->nullable();
            $table->string('guadian_name')->nullable();
            $table->string('guadian_cnic')->nullable();
            $table->string('guadian_number')->nullable();
            $table->string('relation_guadian')->nullable();
            $table->string('occupation')->nullable();
            $table->string('deals')->nullable();
            $table->string('designation')->nullable();
            $table->string('last_attended_class')->nullable();
            $table->string('institute')->nullable();
            $table->string('student_total_subjects')->nullable();
            $table->string('student_total_fee')->nullable();
            $table->string('student_discount_fee')->nullable();
            $table->string('student_after_discount_fee')->nullable();
            $table->string('total_marks')->nullable();
            $table->string('obt_marks')->nullable();
            $table->string('percentage')->nullable();
            $table->string('year')->nullable();
            $table->string('sibling_name')->nullable();
            $table->string('sibling_class')->nullable();
            $table->string('sibling_institute')->nullable();
            $table->string('profession')->nullable();
            $table->string('organization')->nullable();
            $table->string('is_active')->nullable();
            $table->string('enrollment')->nullable();
            $table->string('permanent')->nullable();
            $table->string('contract')->nullable();
            $table->string('teacher_degree')->nullable();
            $table->string('teacher_program')->nullable();
            $table->string('teacher_degree_status')->nullable();
            $table->string('teacher_university')->nullable();
            $table->string('teacher_year')->nullable();
            $table->string('teacher_professional_field')->nullable();
            $table->string('teacher_experience')->nullable();
            $table->string('teacher_picture')->nullable();
            $table->longText('description')->nullable();
            $table->string('enter_type')->nullable()->comment('1 = student, 2 = query, 3 = teacher, 4 = staff');
            $table->string('added_from')->nullable();
            $table->string('is_email_verified')->nullable();
            $table->string("emailToken")->nullable();
            $table->string("reset_token")->nullable();
            $table->string("role_assign")->nullable();
            $table->string("fees_paid_status")->nullable();
            $table->string("fees_giving_date")->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
