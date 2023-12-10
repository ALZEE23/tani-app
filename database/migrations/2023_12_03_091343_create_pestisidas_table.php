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
        Schema::create('pestisidas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('opt');
            $table->string('bahan_aktif');
            $table->string('produk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pestisidas');
    }
};
