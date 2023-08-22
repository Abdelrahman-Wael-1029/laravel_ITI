<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestMulti extends Model
{
    use HasFactory;
    protected $table = 'test_multi';
    protected $fillable = ['id', 'name', 'description'];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function user()
    {
        return $this->belongsToMany(User::class, 'user_test', 'test_id', 'user_id');
    }
}
