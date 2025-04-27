<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id(); // id chi tiết đơn hàng
            $table->unsignedBigInteger('order_id'); // liên kết đơn hàng
            $table->unsignedBigInteger('product_id'); // liên kết sản phẩm
            $table->unsignedInteger('quantity_order'); // số lượng sản phẩm trong đơn
            $table->decimal('price', 15, 2); // giá tại thời điểm đặt
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
