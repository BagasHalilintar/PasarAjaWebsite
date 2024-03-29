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
        Schema::create('sp_1_promo', function (Blueprint $table) {
            $table->id('id_promo');
            $table->unsignedBigInteger('id_product');
            $table->integer('promo_price');
            $table->double('percentage');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
            $table->foreign('id_product')->references('id_product')
                ->on('sp_1_prod')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sp_1_promo');
    }
};
