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
        Schema::create('shows', function (Blueprint $table) {
            $table->id();
            $table->string('slug',60)->unique();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('poster_url',255)->nullable();
            $table->boolean('bookable')->default(false);
            $table->decimal('price',10,2)->nullable();
            $table->foreignId('location_id')->nullable(); //Foreign key...champ est créé mais n'indique pas qui à la clef étrangère
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            
            //Foreign key
            $table->index('location_id');

            //Contraintes d'intégrité référentielle
            $table->foreign('location_id')->references('id')->on('locations')
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
        Schema::dropIfExists('shows');
    }
};
