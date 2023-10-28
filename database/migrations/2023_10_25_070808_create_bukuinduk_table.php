<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('buku_induks', function (Blueprint $table) {
            $table->id();
            $table->enum('asal', ['Beli', 'Hadiah', 'Proyek']);
            $table->string('pengarang', 150);
            $table->string('judul_buku', 150);
            $table->string('impresium', 100);
            $table->integer('jml_jdl');
            $table->integer('jml_ext');
            $table->string('no_inven', 100);
            $table->string('no_kelas', 100);
            $table->set('bahasa', ['I', 'A', 'D']);
            $table->set('macam', ['T', 'F', 'R', 'L']);
            $table->string('keterangan', 150);
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukuinduk');
    }
};
