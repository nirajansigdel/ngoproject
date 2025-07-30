<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demands', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->nullable()->constrained()->onDelete('cascade'); // Added nullable()
             $table->string('heading')->nullable();
            $table->string('subtitle')->nullable();
            $table->date('from_date')->nullable(); // Added nullable()
            $table->date('to_date')->nullable(); // Added nullable()
            $table->text('content')->nullable(); // Added nullable()
            
            $table->string('image')->nullable(); // Added nullable()
            $table->string('vacancy')->nullable(); // Added nullable()
            $table->string('demand_types[]')->nullable(); // Added nullable()
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
        Schema::dropIfExists('demands');
    }
}