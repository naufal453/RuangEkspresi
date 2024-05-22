<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id('id_event');
            $table->string('nama_event');
            $table->text('deskripsi_event');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->unsignedBigInteger('id_pengguna'); // foreign key dari tabel pengguna
            $table->unsignedBigInteger('id_komunitas'); // foreign key dari tabel komunitas
            $table->timestamps();

            $table->foreign('id_pengguna')->references('id')->on('penggunas');
            $table->foreign('id_komunitas')->references('id_komunitas')->on('komunitas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}
