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
        //add new column onto the table
        //Schema mmg syntax for database, cars=table name
        Schema::table('cars', function(Blueprint $table){
            $table->string('attachment')->nullable()->after('rangeprice');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //use to drop the column
        //Blueprint class in Laravel is used to define the structure of database tables
        Schema::table('cars', function(Blueprint $table){
            $table->dropcolumn('attachment');
        });
    }
};
