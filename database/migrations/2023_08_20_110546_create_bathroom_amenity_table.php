<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBathroomAmenityTable extends Migration
{
    public function up()
    {
        Schema::create('bathroom_amenity', function (Blueprint $table) {
            $table->foreignId('bathroom_id')->constrained();
            $table->foreignId('amenity_id')->constrained();
            $table->primary(['bathroom_id', 'amenity_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('bathroom_amenity');
    }
}
