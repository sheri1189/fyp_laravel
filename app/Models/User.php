<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "registeration_no",
        "degree",
        "program",
        "session",
        "class",
        "name",
        "father_name",
        "start_date",
        "cnic",
        "email",
        "password",
        "email_verified_at",
        "contact_no",
        "gender",
        "date_of_birth",
        "student_status",
        "batch",
        "address",
        "guadian_name",
        "guadian_cnic",
        "guadian_number",
        "relation_guadian",
        "occupation",
        "deals",
        "designation",
        "last_attended_class",
        "institute",
        "total_marks",
        "obt_marks",
        "percentage",
        "year",
        "sibling_name",
        "sibling_class",
        "sibling_institute",
        "profession",
        "organization",
        "is_active",
        "enrollment",
        "permanent",
        "contract",
        "teacher_degree",
        "teacher_program",
        "teacher_degree_status",
        "teacher_university",
        "teacher_year",
        "teacher_professional_field",
        "teacher_experience",
        "teacher_picture",
        "description",
        "reset_token",
        "enter_type",
        "added_from",
        "emailToken",
        "is_email_verified",
        "role_assign", "student_total_subjects", "student_total_fee", "student_discount_fee", "student_after_discount_fee","fees_paid_status","fees_giving_date"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
