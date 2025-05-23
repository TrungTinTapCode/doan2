<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
Schema::create('comments', function (Blueprint $table) {
$table->id();
$table->unsignedBigInteger('product_id');
$table->unsignedBigInteger('customer_id');
$table->text('content');
$table->timestamps();
    $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
    $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
