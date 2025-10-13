<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    protected $fillable = ['teacher_id', 'title', 'category', 'price'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
