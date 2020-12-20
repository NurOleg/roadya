<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'family'                => 'Семейное',
            'interesting'           => 'Интересное',
            'inexpensive'           => 'Недорогое',
            'alcohol'               => 'С алкоголем',
            'big_transport_parking' => 'Парковка для большого транспорта',
            'cashless'              => 'Безналичный расчет',
            'togo'                  => 'На вынос',
            'for_truckers'          => 'Для дальнобойщиков',
            'couples'               => 'Для пар',
            '24-hour_front_desk'    => 'Круглосуточная стойка регистрации',
            'shower'                => 'С душем',
            'cargo'                 => 'Грузовой',
            'passenger'             => 'Легковой',
            'with_loader'           => 'С погрузчиком',
            'moto'                  => 'Мото',
            'with_parts_store'      => 'С магазином запчастей',
            'free'                  => 'Бесплатное',
            'thrill'                => 'Острые ощущения',
            'user_marks'            => 'Отметки пользователей',
            'great_view'            => 'Отличный вид',
        ];

        foreach ($tags as $code => $value) {
            DB::table('tags')->insert([
                'name' => $value,
                'code'    => $code,
            ]);
        }
    }
}
