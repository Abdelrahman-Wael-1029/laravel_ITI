<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Category extends Model
{
    use HasFactory;
    protected $table = "category";
    protected $fillable = [
        'id',
        'name',
        'description',
        'user_id'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function products(){
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
