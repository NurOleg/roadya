<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->json('content');
            $table->unsignedBigInteger('placemark_id');
            $table->uuid('user_id');
            $table->timestamps();
        });

        Schema::table('services', function (Blueprint $table) {
            $table
                ->foreign('placemark_id')
                ->references('id')
                ->on('placemarks')
                ->onDelete('cascade');

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign(['placemark_id', 'user_id']);
        });

        Schema::dropIfExists('services');
    }
}
