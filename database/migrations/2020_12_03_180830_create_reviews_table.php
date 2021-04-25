<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(false);
            $table->longText('text');
            $table->integer('rating');
            //$table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('placemark_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['placemark_id']);
        });
        Schema::dropIfExists('reviews');
    }
}
