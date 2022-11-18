<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryLevel extends Model
{
    use HasFactory;
    protected $fillable = [
        'level',
        'category_id',
    ];
    /**
     * Get the Category that owns the CategoryLevel.
     */
    public function categorys()
    {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }

}
