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
        Schema::create('tb_iuran', function (Blueprint $table) {
            $table->id();
            $table->integer("id_santri");
            $table->date("tanggal");
            $table->string("bukti");
            $table->integer("status_validasi");
            $table->integer("id_users");
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
        Schema::dropIfExists('tb_iuran');
    }
};
