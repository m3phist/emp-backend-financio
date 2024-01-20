<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employee';
    protected $primaryKey = 'id';
    protected $fillable = [
        'firstName',
        'lastName',
        'gender',
        'dob',
        'nid',
        'email',
        'address',
        'contact',
        'department',
        'designation',
        'joiningDate',
        'salary',
        'status',
    ];

    protected $casts = [
        'dob' => 'datetime:c',
        'joiningDate' => 'datetime:c',
    ];


}
