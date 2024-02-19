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
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('tenant_id')->unsigned()->nullable();

            $table->integer('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')
                    ->on('customers')
                    ->references('id')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            
            $table->integer('location_id')->unsigned()->nullable();
            $table->foreign('location_id')
                    ->on('locations')
                    ->references('id')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
