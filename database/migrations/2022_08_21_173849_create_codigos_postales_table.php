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
        Schema::create('codigos_postales', function (Blueprint $table) {
            $table->increments('id');
            $table->String('d_codigo');
            $table->String('d_asenta')->nullable();
            $table->String('d_tipo_asenta')->nullable();
            $table->String('D_mnpio')->nullable();
            $table->String('d_estado')->nullable();
            $table->String('d_ciudad')->nullable();
            $table->String('d_CP')->nullable();
            $table->String('c_estado')->nullable();
            $table->String('c_oficina')->nullable();
            $table->String('c_CP')->nullable();
            $table->String('c_tipo_asenta')->nullable();
            $table->String('c_mnpio')->nullable();
            $table->String('id_asenta_cpcons')->nullable();
            $table->String('d_zona')->nullable();
            $table->String('c_cve_ciudad')->nullable();
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
        Schema::dropIfExists('codigos_postales');
    }
};
