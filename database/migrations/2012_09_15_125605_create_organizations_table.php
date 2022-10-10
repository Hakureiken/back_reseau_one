<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('siret');
            $table->string('numSalaries');
            $table->string('codeAPENAF');
            $table->string('numTVA');
            $table->string('opcoOpca');
            $table->string('idcc');
            $table->string('denominationUniteLegale');
            $table->string('libelleCommuneEtablissement');
            $table->string('postalCodeEtablissement');
            $table->string('numVoieEtablissement');
            $table->string('typeVoieEtablissement');
            $table->string('libelleVoieEtablissement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizations');
    }
};
