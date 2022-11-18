<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    /**
     * Get the CategoryLevel for the blog Category.
     */
    public function categoryLevels()
    {
        return $this->hasMany(CategoryLevel::class);
    }
     // this way remove child and parent data from database
     public static function boot() {
        parent::boot();

        static::deleting(function($cat) { 
             $cat->categoryLevels()->delete();
        });
    }
}
