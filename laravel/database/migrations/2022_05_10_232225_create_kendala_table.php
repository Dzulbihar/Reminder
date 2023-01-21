<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendalaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendala', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_request')->nullable();
            $table->string('kategori')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('keterangan1')->nullable();
            $table->string('user_entry')->nullable();
            $table->string('target')->nullable();
            $table->string('status')->nullable();
            
            $table->string('file_pendukung_1')->nullable();
            $table->string('file_pendukung_2')->nullable();
            $table->string('file_pendukung_3')->nullable();
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
        Schema::dropIfExists('kendala');
    }
}
