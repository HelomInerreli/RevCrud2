<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'city'];

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
