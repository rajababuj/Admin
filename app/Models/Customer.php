<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'email', 'age', 'phone', 'address', 'image', 
    'membership_id', 'assigned_trainer_id', 'amount_paid', 'gender', 'in', 'out'];

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class, 'assigned_trainer_id');
    }
    public function getImageAttribute($image)
    {
        // Assuming the image is stored in the public folder under 'uploads/image'
        return asset('uploads/image/' . $image);
    }


}
