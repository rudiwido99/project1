<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('produk_id')->nullable()->unsigned();

            // $table->bigInteger('produk_id')->unsigned();
            $table->foreignId('produk_id')->constrained('produk')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name', 100);
            $table->integer('harga')->nullable();
            $table->tinyinteger('ukuran')->nullable();
            $table->text('info')->nullable();
            $table->timestamps();
        });

        // Schema::table('detail', function (Blueprint $table) {
        //     $table->foreign('produk_id')->references('id')->on('produk')
        //           ->onDelete('cascade')->onUpdate('cascade');
        // });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail');
    }
}
