<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    public function classes()
    {
        return $this->belongsToMany(SchoolClass::class,'school_class_teachers');
    }
}
