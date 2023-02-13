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
        Schema::create('representations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->nullable();
            $table->foreignId('show_id');
            $table->dateTime('when');

            $table->foreign('location_id')->references('id')->on('locations')
            ->onDelete('RESTRICT')
            ->onUpdate('CASCADE');

            $table->foreign('show_id')->references('id')->on('shows')
            ->onDelete('RESTRICT')
            ->onUpdate('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('representations');
    }
};
