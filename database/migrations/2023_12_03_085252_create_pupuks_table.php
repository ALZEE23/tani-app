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
        Schema::create('pupuks', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('judul');
            $table->string('cover');
            $table->string('file');
<<<<<<< HEAD
            $table->timestamps(); // This automatically adds created_at and updated_at columns
        });
=======
            $table->timestamps();
        }); // Gunakan timestamps() untuk menyertakan created_at dan updated_at
            
>>>>>>> d76768c9a246fe8164cd43c7d44de27557c17cc3
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pupuks');
    }
};
