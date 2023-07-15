<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('place_id')->unique();
            $table->string('name');
            $table->string('formatted_address');
            $table->string('opening_hours');
            $table->text('reviews');
            $table->decimal('latitude');
            $table->decimal('longitude');
            $table->integer('review_count');
            $table->decimal('rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
};
