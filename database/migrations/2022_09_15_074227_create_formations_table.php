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
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('id_crm')->nullable();
            $table->string('laraRef')->unique();
            $table->string('assignedUserName')->nullable();
            $table->string('assignedUserId')->nullable();
            $table->string('name');
            $table->text('concernedPublic');
            $table->text('dateAndLocation');
            $table->text('description');
            $table->text('objective');
            $table->text('prerequisite');
            $table->text('trainingprogram');
            $table->string('reference')->unique();
            $table->integer('duration_hours');
            $table->integer('duration_days');
            $table->foreignId('document_id')->nullable()->constrained();
            $table->boolean('is_submitted');
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
        Schema::dropIfExists('formations');
    }
};
