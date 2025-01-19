<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kitaplars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('selflink');
            $table->string('yazarid');
            $table->string('kategoriid');
            $table->string('yayineviid');
            $table->text('aciklama');
            $table->string('image');
            $table->float('fiyat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kitaplars');
    }
};
