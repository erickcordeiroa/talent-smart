<?php

namespace App\Models\Candidate;

use App\Models\Company\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserJob extends Model
{
    use HasFactory;

    public $table = 'user_jobs';

    protected $fillable = [
        'user_id',
        'job_id'
    ];

    public function jobs()
    {
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
