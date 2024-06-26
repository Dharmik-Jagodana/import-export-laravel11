<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'user_id',
        'name',
        'stock',
        'price',
        'deatils',
    ];

    public function getUser() 
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
