<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category','price','size', 'image','status',];
    
    public function categoryDetail(){
        return $this->belongsTo(Category::class, 'category', 'id');
    }

    public function sizeDetail(){
        return $this->belongsTo(Size::class,'size', 'id');
    }

    public function getImageAttribute($image)
    {
        // Assuming the image is stored in the public folder under 'uploads/image'
        return asset('uploads/image/' . $image);
    }
}
