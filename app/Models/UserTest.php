<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTest extends Model
{
    use HasFactory;
    protected $table = 'user_test';
    protected $fillable = ['id','user_id', 'test_id'];
    
}
