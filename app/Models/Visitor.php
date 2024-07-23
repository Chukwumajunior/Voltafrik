<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Visitor extends Model
{
    use HasFactory;
    use HasRoles;

    protected $fillable = ['ip_address', 'user_agent'];
}
