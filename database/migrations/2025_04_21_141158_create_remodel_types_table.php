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
        Schema::create('remodel_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subservice_id'); // Foreign key for subservice_categories table
            $table->string('name');
            $table->timestamps();
            
            $table->foreign('subservice_id')->references('id')->on('subservice_categories')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remodel_types');
    }
};
