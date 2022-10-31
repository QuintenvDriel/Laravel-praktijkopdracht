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
        Schema::create('pokemons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('Image')->nullable();
            $table->string('Name');
            $table->string('DexNumber');
            $table->string('Type1');
            $table->string('Type2')->nullable();
            $table->text('DexEntry')->nullable();
            $table->integer('Gen');
            $table->boolean('Status')->default(1);
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
        Schema::dropIfExists('pokemons');
    }
};
