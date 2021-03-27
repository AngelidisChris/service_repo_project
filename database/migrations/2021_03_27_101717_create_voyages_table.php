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
            $table->foreignIdFor(Vessel::class);
            $table->string('code', 64);
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('status', 16);
            $table->decimal('revenues', 8,2);
            $table->decimal('expenses', 8,2);
            $table->decimal('profit', 8,2);
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
