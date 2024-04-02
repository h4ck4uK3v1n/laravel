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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types');

            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers');

            $table->string('code');
            $table->string('name');
            $table->string('image_url')->nullable();
            $table->string('description')->nullable();
            $table->boolean('active')->default(true);
            $table->integer('stock')->default(1);
            $table->integer('stock_total')->nullable();
            $table->integer('costo')->nullable();
            $table->date('fecha_ing')->nullable();
            $table->date('fecha_sal')->nullable();
            $table->string('unidad')->nullable();
            $table->string('reponsable')->nullable();
            $table->string('entregado_a')->nullable();
            $table->string('Nro_factura')->nullable();
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
        Schema::dropIfExists('materials');
    }
};
