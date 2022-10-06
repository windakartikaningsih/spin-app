<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKatalogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katalog', function (Blueprint $table) {
            $table->id();
            $table->integer('kategori_id')->nullable();
            $table->string('ukuran', 100)->nullable();
            $table->string('harga', 100)->nullable();
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('katalog');
    }
}
