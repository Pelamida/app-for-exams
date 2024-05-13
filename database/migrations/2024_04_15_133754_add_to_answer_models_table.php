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
        Schema::table('answer_models', function (Blueprint $table) {
            //
            $table->integer('subject_model_id')->unsigned();
            $table->foreign('subject_model_id')->references('id')->on('subject_models');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('answer_models', function (Blueprint $table) {
            //
        });
    }
};
