<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Fields in which mass assignment can be used
    protected $fillable = ['name', 'email', 'phone', 'dob', 'college_id'];

    /**
     * Define an inverse One-to-Many relationship:
     * Each student belongs to a single college.
     */
    public function college()
    {
        return $this->belongsTo(College::class);
    }
}
