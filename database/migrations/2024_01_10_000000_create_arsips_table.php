<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('arsips', function (Blueprint $table) {
            $table->id('arsip_id');
            $table->string('jenis_surat');
            $table->string('perihal');
            $table->date('tanggal_surat');
            $table->string('asal_surat');
            $table->text('keterangan');
            $table->string('file_surat');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('arsips');
    }
};
