<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Role;



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

    function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    function role(){
        return $this->hasOneThrough(Role::class, User::class, 'role_id', 'user_id', 'id', 'id');
    }

}
