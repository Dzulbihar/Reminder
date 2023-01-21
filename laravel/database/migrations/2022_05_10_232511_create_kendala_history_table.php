<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendalaHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendala_history', function (Blueprint $table) {
            $table->id();
            $table->string('user_delete')->nullable();
            $table->string('alasan_delete')->nullable();

            $table->string('tgl_created_at')->nullable();
            $table->string('tgl_updated_at')->nullable();

            $table->string('user_entry')->nullable();
            $table->string('jenis_request')->nullable();
            $table->string('kategori')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('keterangan1')->nullable();
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
        Schema::dropIfExists('kendala_history');
    }
}
