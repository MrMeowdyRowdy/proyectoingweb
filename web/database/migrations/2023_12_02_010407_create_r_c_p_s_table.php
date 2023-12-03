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
        Schema::create('r_c_p_s', function (Blueprint $table) {
            $table->id();
            $table->integer("interpreterID");
            $table->integer("llamadaID");
            $table->integer("tipo");
            $table->string('mensaje')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('r_c_p_s');
    }
};
