<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->text('description')->nullable();
            $table->string('entry_type')->nullable();
            $table->string('document_number')->nullable();
            $table->string('location_code')->nullable();
            $table->string('quantity')->nullable();
            $table->string('unit')->nullable();
            $table->string('unit_of_measure_code')->nullable();
            $table->string('item_category_code')->nullable();
            $table->string('lot_number')->nullable();
            $table->string('posting_date')->nullable();
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
        Schema::dropIfExists('items');
    }
}
