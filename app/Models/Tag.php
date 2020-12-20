<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * @return BelongsToMany
     */
    public function placemarks(): BelongsToMany
    {
        return $this->belongsToMany(Placemark::class);
    }
}
