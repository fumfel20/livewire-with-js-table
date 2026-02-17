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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_code')->index('product_code_idx');
            $table->string('product_description')->index('product_description_idx');
            $table->integer('length')->index('length_idx');
            $table->integer('width')->index('width_idx');
            $table->integer('height')->index('height_idx');
            $table->integer('price')->index('price_idx');
            $table->unsignedTinyInteger('product_type_id');
            $table->foreign('product_type_id')
                ->references('id')
                ->on('product_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
