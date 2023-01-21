<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendalaDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendala_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kendala_id');
            $table->foreignId('parent');
            $table->string('user_entry')->nullable();
            $table->string('komentar')->nullable();
            $table->string('file_pendukung')->nullable();
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
        Schema::dropIfExists('kendala_detail');
    }
}
