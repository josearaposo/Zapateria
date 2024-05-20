<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('zapatos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo' , 13)->unique();
            $table->string('denominacion');
            $table->decimal('precio', 6, 2);
            $table->timestamps();
        });

        DB::statement("ALTER TABLE zapatos
        ADD CONSTRAINT ck_codigo_valido
        CHECK (codigo SIMILAR TO '%[0-9]{13}%')");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zapatos');
    }
};
