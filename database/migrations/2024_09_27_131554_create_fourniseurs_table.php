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
        Schema::create('fourniseurs', function (Blueprint $table) {
            $table->increments("id");
            $table->string("nom");
            $table->string("prenom");
            $table->string("contact");
            $table->string("email");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fourniseurs');
    }
};
