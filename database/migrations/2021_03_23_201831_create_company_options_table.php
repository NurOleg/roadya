<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_options', function (Blueprint $table) {
            $table->id();
            $table->string('director_surname')->nullable(false);
            $table->string('director_name')->nullable(false);
            $table->string('director_patronymic')->nullable(false);
            $table->string('legal_address')->nullable(false);
            $table->string('ogrn')->nullable(false);
            $table->string('bank_account')->nullable(false);
            $table->string('inn')->nullable(false);
            $table->string('bik')->nullable(false);
            $table->string('post_address')->nullable(false);
            $table->string('kpp')->nullable(false);
            $table->string('personal_account')->nullable(false);
            $table->unsignedBigInteger('user_id');
        });

        Schema::table('company_options', function (Blueprint $table) {
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
        Schema::table('company_options', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('company_options');
    }
}
