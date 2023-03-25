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
        Schema::create('lc_phrases', function (Blueprint $table) {
            $table->id();
            $table->string('item');
            $table->string('lang');
            $table->foreign('lang')->references('lang')->on('lc_langs')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('value');
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
        Schema::dropIfExists('lc_phrases');
    }
};
