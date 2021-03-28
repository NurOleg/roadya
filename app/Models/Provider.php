<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = ['provider', 'provider_id', 'user_id', 'avatar'];

    protected $hidden = ['created_at', 'updated_at'];
}
