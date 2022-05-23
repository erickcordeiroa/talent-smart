<?php

namespace App\Models\Candidate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    public $table = 'educations';
    protected $fillable = [
        'user_id',
        'title',
        'degree',
        'company',
        'description',
        'start',
        'end',
    ];
}
