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
        Schema::create('log_transfers', function (Blueprint $table) {
            $table->id()->autoincrement();
            $table->unsignedBigInteger('utilisateur_id');
            $table->string('action', 255)->default("Debit");
            $table->decimal('montant', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_transfers');
    }
};
