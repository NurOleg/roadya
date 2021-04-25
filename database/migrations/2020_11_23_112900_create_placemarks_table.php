<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placemarks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->nullable(false);
            $table->string('address');
            $table->string('url');
            $table->string('phone');
            $table->string('instagram');
            $table->string('telegram');
            $table->string('whatsapp');
            $table->longText('description');
            $table->string('vk');
            $table->string('viber');
            $table->point('point');
            //$table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->spatialIndex('point');

            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('placemarks', function (Blueprint $table) {
            $table->dropSpatialIndex(['point']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('placemarks');
    }
}
