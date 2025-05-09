<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'title',
        'author',
        'publication_year',
        'price',
        'description',
        'sales_count',
        'total_revenue',
        'avarage_rating',
        'discount',
        'original_language',
        'category_id',
        'image_url',
        'color',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
