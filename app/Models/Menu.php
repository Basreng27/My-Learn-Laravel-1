<?php

namespace App\Models;

use App\Bases\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Menu extends BaseModel implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = 'menus';
    protected $keyType = 'string';
    protected $logFillable = true;
    public $timestamps = true;

    protected $fillable = [
        'parent_id',
        'label',
        'code',
        'url',
        'icon',
    ];
}
