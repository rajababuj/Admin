<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected
        $fillable = ['name', 'email', 'age', 'phone', 'address', 'image', 'gender', 'trainings_id'];

    // public function customers()
    // {
    //     return $this->hasMany(Customer::class, 'assigned_trainer_id');
    // }
    public function trainings()
    {
        return $this->belongsTo(Trainings::class, 'trainings_id');
    }

    public function getImageAttribute($image)
    {
        // Assuming the image is stored in the public folder under 'uploads/image'
        return asset('uploads/image/' . $image);
    }
}
