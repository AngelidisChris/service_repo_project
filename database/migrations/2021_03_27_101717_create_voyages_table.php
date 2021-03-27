<?php

use App\Models\Vessel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoyagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voyages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger( 'vessel_id');
            $table->string('code', 64)->nullable();
            $table->dateTime('start');
            $table->dateTime('end')->nullable();
            $table->string('status', 16)->default('pending');
            $table->decimal('revenues', 8,2)->nullable();;
            $table->decimal('expenses', 8,2)->nullable();;
            $table->decimal('profit', 8,2)->nullable();;
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
        Schema::dropIfExists('voyages');
    }
}
