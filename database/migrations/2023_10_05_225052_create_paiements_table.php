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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->string('date_paiement',255);
            $table->string('heure_paiement',255);
            $table->string('mode_paiement',255);
            $table->integer('numero_paiement');
            $table->double('montant_paiement')->default(0);
            $table->foreignId('billet_id')->constrained('billets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
