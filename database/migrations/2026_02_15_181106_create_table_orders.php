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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('status_id')->unsigned();
            $table->date('delivery_date')->index('delivery_date_idx');
            $table->foreign(['status_id'], 'orders_status_fk')
                ->references(['id'])
                ->on('order_statuses')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->dateTime('created_at')->nullable()->useCurrent();
            $table->dateTime('updated_at')->nullable();
        });
        DB::statement("ALTER TABLE orders AUTO_INCREMENT = 10000000;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
