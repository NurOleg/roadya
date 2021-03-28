<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IndividualOptions extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'checking_account',
        'ogrnip',
        'address',
        'post_address',
        'inn',
        'kpp',
        'bik',
        'personal_account'
    ];


    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
