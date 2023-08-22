<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = "role";

    protected $fillable = [
        'id',
        'name',
        'level',
        'description'
    ];

    public function users()
    {
        return $this->hasmany(User::class, 'role_id', 'id');
    }

    function category(){
        
        return $this->hasManyThrough(Category::class, User::class, 'role_id', 'user_id', 'id', 'users.id');
    }

    function scopeTest($query, $id){
        return $query->find($id)->category;
    }
}
