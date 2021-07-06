<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidmainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bid_main', function (Blueprint $table) {
            $table->id();
            $table->string('user_id',255);
            $table->string('nama_barang',255);
            $table->string('image',255);
            $table->integer('pemenang')->nullable();
            $table->text('description');
            $table->boolean('status');
            $table->timestamp('last_bid');
            $table->integer('harga_pemenang');
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
        Schema::dropIfExists('bid');
    }
}
