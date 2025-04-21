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
        Schema::create('subservice_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_category_id'); // Foreign key for service_categories table
            $table->string('name');
            $table->timestamps();
            
            $table->foreign('service_category_id')->references('id')->on('service_categories')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subservice_categories');
    }
};
