<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\DB;

class Placemark extends Model
{
    use HasFactory;

    public const TYPE_CAFE = 'cafe';
    public const TYPE_HOTEL = 'hotel';
    public const TYPE_CAR_SERVICE = 'car_service';
    public const TYPE_PLACE = 'interesting_place';
    public const TYPE_CAMPING = 'camping';

    public const TYPES = [
        self::TYPE_CAFE,
        self::TYPE_HOTEL,
        self::TYPE_CAR_SERVICE,
        self::TYPE_PLACE,
        self::TYPE_CAMPING,
    ];

    public const TYPES_NAMES = [
        self::TYPE_CAFE => 'Кафе',
        self::TYPE_HOTEL => 'Отель',
        self::TYPE_CAR_SERVICE => 'Автоцентр',
        self::TYPE_PLACE => 'Места',
        self::TYPE_CAMPING => 'Кемпинг',
    ];

    public const TAGS_BY_TYPES = [
        self::TYPE_CAFE        => [
            'family' => 'Семейное',
            'interesting' => 'Интересное',
            'inexpensive' => 'Недорогое',
            'alcohol' => 'Алкоголь',
            'big_transport_parking' => 'Парковка для большого транспорта',
            'cashless' => 'Безналичная оплата',
            'togo' => 'С собой',
            'for_truckers' => 'Для дальнобойщиков'
        ],
        self::TYPE_HOTEL       => [
            'family' => 'Семейный',
            'couples' => 'Для пар',
            'inexpensive' => 'Недорогой',
            '24-hour_front_desk' => 'Круглосуточная стойка регистрации',
            'shower' => 'С душем'
        ],
        self::TYPE_CAR_SERVICE => [
            'cargo' => 'Грузовые',
            'passenger' => 'Легковые',
            'with_loader' => 'С эвакуатором',
            'moto' => 'Мото',
            'with_parts_store' => 'С магазином запчастей'
        ],
        self::TYPE_PLACE       => [
            'family' => 'Семейное',
            'free' => 'Бесплатное',
            'inexpensive' => 'Недорогое',
            'thrill' => 'Захватывающее',
            'user_marks' => 'Посетители рекомендуют'
        ],
        self::TYPE_CAMPING     => [
            'family' => 'Семейный',
            'interesting' => 'Интересный',
            'inexpensive' => 'Недорогой',
            'great_view' => 'Отличные виды'
        ],
    ];

    protected $fillable = [
        'name',
        'address',
        'url',
        'phone',
        'instagram',
        'telegram',
        'whatsapp',
        'vk',
        'viber',
        'point',
        'user_id',
        'type'
    ];

    protected $geometry = ['point'];

    /**
     * Select geometrical attributes as text from database.
     *
     * @var bool
     */
    protected $geometryAsText = true;

    /**
     * @return MorphMany
     */
    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imagable');
    }

    /**
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * @return HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function rating(): HasMany
    {
        return $this
            ->reviews()
            ->selectRaw('avg(rating) as rating, placemark_id')
            ->groupBy('placemark_id');
    }

    /**
     * @return |null
     */
    public function getRatingAttribute()
    {
        if (!array_key_exists('rating', $this->relations)) {
            $this->load('rating');
        }

        $relation = $this->getRelation('rating')->first();

        return ($relation) ? $relation->rating : null;
    }

    /**
     * Get a new query builder for the model table.
     * Manipulate in case we need to convert geometrical fields to text.
     *
     * @param bool $excludeDeleted
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function newQuery($excludeDeleted = true)
    {
        if (!empty($this->geometry) && $this->geometryAsText === true) {
            $raw = '';
            foreach ($this->geometry as $column) {
                $raw .= 'ST_X(' . $this->table . '' . '' . $column . ') as latitude, ';
                $raw .= 'ST_Y(' . $this->table . '' . '' . $column . ') as longitude, ';
            }

            $raw = substr($raw, 0, -2);

            return parent::newQuery()->addSelect('*', DB::raw($raw));
        }

        return parent::newQuery();
    }

//    /**
//     * @return array
//     */
//    public function getPointAttribute(): array
//    {
//        return [$this->latitude, $this->longitude];
//    }
}
