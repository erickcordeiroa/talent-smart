<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'fantasy',
        'document',
        'email',
        'cover',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'client_id', 'id');
    }
}
