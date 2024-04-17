<?php

namespace App\Models\Company;

use App\Models\Category;
use App\Models\JobBenefit;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory, Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public $table = 'jobs';

    public $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
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

    public function clients()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
