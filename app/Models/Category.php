<?php

namespace App\Models;

use App\Models\Company\Job;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $fillable = ['title'];

    public function jobs()
    {
        return $this->hasOne(Job::class);
    }
}
