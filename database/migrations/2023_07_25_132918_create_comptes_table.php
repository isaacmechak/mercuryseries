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
        Schema::create('comptes', function (Blueprint $table) {
            $table->id();
            $table->decimal('derniere_sortie', 10, 2);
            $table->decimal('derniere_entree', 10, 2);
            $table->decimal('solde', 10, 2);
            $table->unsignedBigInteger('utilisateur_id');
            $table->timestamps();

            $table->foreign('utilisateur_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comptes');
    }
};
