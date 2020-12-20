<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = ['path'];

    /**
     * @return MorphTo
     */
    public function imagable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @param string $path
     * @return string
     */
    public function getPathAttribute(string $path): string
    {
        return Storage::url($path);
    }
}
