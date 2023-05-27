<?php

namespace App\Models;

use App\Bases\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends BaseModel implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = 'users';
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
    ];
}
