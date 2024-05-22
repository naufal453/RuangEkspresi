<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanKomunitasTable extends Migration
{
    public function up()
    {
        Schema::create('permohonan_komunitas', function (Blueprint $table) {
            $table->id('id_permohonan');
            $table->unsignedBigInteger('pengguna_id');  // Menambahkan kolom untuk foreign key pengguna_id
            $table->foreign('pengguna_id')->references('id')->on('penggunas');
            $table->string('nama_komunitas');
            $table->text('deskripsi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('permohonan_komunitas');
    }
}
