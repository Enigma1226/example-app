<?php

namespace App\Models;

use Database\Factories\ClassroomFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classroom extends Model
{
    /** @use HasFactory<ClassroomFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'major',
        'grade_level',
        'homeroom_teacher',
        'capacity',
    ];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
