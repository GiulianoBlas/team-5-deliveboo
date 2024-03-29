<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ingredients',
        'description',
        'price',
        'available',
        'image',
        'restaurant_id'
        
    ];

    protected $hidden=[
        'created_at',
        'updated_at',

    ];

    public function getFullImageAttribute() {
        if($this->image) {
            return asset('storage/' . $this->image);
        } return null;

    }

    protected $appends = [
        'full_image'
    ];

    public function restaurant(){

        return $this->belongsTo(Restaurant::class);

    }

    public function orders(){

        return $this->belongsToMany(Order::class)->withPivot('quantity');

    }
    
}
