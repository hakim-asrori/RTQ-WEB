<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_penilaian_tadribat', function (Blueprint $table) {
            $table->id();
            $table->string("halaman");
            $table->string("bagian");
            $table->integer("nilai");
            $table->string("keterangan");
            $table->integer("id_santri");
            $table->integer("id_asatidz");
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
        Schema::dropIfExists('tb_penilaian_tadribat');
    }
};
