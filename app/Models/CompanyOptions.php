<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyOptions extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'director_surname',
        'director_name',
        'director_patronymic',
        'legal_address',
        'ogrn',
        'bank_account',
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
