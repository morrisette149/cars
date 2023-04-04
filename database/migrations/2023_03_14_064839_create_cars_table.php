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
        Schema::create('cars', function (Blueprint $table) {
            /*create table in database*/
            $table->id();
            $table->string('carname');
            $table->string('carcolour');
            $table->float('rangeprice', 8, 2);/*declare price with a precision of 8 digits and a scale of 2 digits*/
            $table->softDeletes();/*create new column for soft delete*/
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
