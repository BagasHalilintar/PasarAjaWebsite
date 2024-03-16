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
        Schema::create('0reports', function (Blueprint $table) {
            $table->id('id_report');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_shop');
            $table->integer('id_product');
            $table->text('reason');
            $table->timestamps();
            $table->foreign('id_user')->references('id_user')
                ->on('0users')->onDelete('no action');
            $table->foreign('id_shop')->references('id_shop')
                ->on('0shops')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('0reports');
    }
};
