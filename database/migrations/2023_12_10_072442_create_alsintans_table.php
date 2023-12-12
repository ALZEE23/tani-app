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
        Schema::create('alsintans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('subsektor');
            $table->string('gapoktan');
            $table->string('ketua_gapoktan');
            $table->string('kontak');
            $table->string('alat');
            $table->string('jumlah_alat');
            $table->string('tahun');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alsintans');
    }
};
