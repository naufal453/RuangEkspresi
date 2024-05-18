<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarsTable extends Migration
{
    public function up()
    {
        Schema::create('komentars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengguna_id');  // Menambahkan kolom untuk foreign key pengguna_id
            $table->unsignedBigInteger('karya_id');
            $table->foreign('pengguna_id')->references('id')->on('penggunas');  // Menambahkan foreign key constraint ke penggunas
            $table->foreign('karya_id')->references('id_karya')->on('karyas');
            $table->text('komentar');
            $table->date('tanggal_komentar');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('komentars');
    }
}
