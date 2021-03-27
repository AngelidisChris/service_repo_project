<?php

use App\Models\Vessel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVesselOpexesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vessel_opexes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Vessel::class);
            $table->date('date');
            $table->decimal('expenses', 8,2);
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
        Schema::dropIfExists('vessel_opexes');
    }
}
