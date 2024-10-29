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
        Schema::create('camisas', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("tamanho");
            $table->string("marca");
            $table->decimal("valor",10,2);
            $table->string("url_imagem",1000);
            $table->boolean("vendido")->default(0);
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
        Schema::dropIfExists('camisas');
    }
};
