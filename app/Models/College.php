<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;

    // Fields that can be mass assigned
    protected $fillable = ['name', 'address'];

    /**
     * Define a One-to-Many relationship:
     * A college can have multiple students.
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}

