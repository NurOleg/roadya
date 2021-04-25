<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndividualOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_options', function (Blueprint $table) {
            $table->id();
            $table->string('checking_account')->nullable(false);
            $table->string('ogrnip')->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('inn')->nullable(false);
            $table->string('bik')->nullable(false);
            $table->string('post_address')->nullable(false);
            $table->string('kpp')->nullable(false);
            $table->string('personal_account')->nullable(false);
            $table->uuid('user_id');
        });

        Schema::table('individual_options', function (Blueprint $table) {
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
        Schema::table('individual_options', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('individual_options');
    }
}
