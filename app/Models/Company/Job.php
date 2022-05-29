<?php

namespace App\Models\Company;

use App\Models\Category;
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
        return $this->hasMany(Category::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
