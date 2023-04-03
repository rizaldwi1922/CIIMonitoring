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
        Schema::create('ships', function (Blueprint $table) {
            $table->id();
            $table->string("owner");
            $table->string("tipe");
            $table->integer("loa");
            $table->integer("lpp");
            $table->integer("b");
            $table->integer("h");
            $table->integer("t");
            $table->integer("gt");
            $table->integer("dwt");
            $table->integer("v");
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
        Schema::dropIfExists('ships');
    }
};
