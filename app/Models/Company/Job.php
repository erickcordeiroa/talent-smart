<?php

namespace App\Models\Company;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public $table = 'jobs';

    public $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'city',
        'salary',
        'match',
        'transport',
        'health',
        'food',
        'snack',
        'tags'
    ];

    public function categories()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
