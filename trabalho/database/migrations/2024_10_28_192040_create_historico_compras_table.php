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
        Schema::create('historico_compras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('camisas_id')
            ->constrained('camisas')
            ->onDelete('cascade');
            $table->foreignId('users_id')
            ->constrained('users')
            ->onDelete('cascade');
            $table->decimal("valor",10,2);
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
        Schema::dropIfExists('historico_compras');
    }
};
