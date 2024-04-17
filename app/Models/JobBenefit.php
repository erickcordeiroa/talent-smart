<?php

namespace App\Models;

use App\Models\Company\Job;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobBenefit extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'benefit_id'
    ];

    protected $table = 'job_benefits';
}
