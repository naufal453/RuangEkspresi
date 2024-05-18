<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryasTable extends Migration
{
    public function up()
    {
        Schema::create('karyas', function (Blueprint $table) {
            $table->id('id_karya');
            $table->foreignId('pengguna_id')->constrained('penggunas');
            $table->string('judul_karya');
            $table->text('deskripsi_karya');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('karyas');
    }
}
