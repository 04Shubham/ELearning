<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

use App\models\FeaturedCategory;

class Category extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table = 'categories';

    protected $fillable = [
            'title', 
            'description',
            'image',
            'meta_title',
            'description_title',
    ];
   
    // public function featured_categories()
    // {
    //     return $this->hasMany(FeaturedCategory::class, 'category_id', 'id');
    // }
    
}
