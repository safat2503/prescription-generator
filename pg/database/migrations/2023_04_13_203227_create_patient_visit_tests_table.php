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
        Schema::create('patient_visit_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_visit_id');
            $table->unsignedBigInteger('test_id');
            $table->foreign('patient_visit_id')->references('id')->on('patient_visits');
            $table->foreign('test_id')->references('id')->on('lab_tests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_visit_tests');
    }
};
