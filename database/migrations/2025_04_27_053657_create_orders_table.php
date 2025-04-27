<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // id đơn hàng
            $table->unsignedBigInteger('customer_id'); // liên kết với bảng customers
            $table->timestamp('date_order')->useCurrent(); // ngày đặt hàng, mặc định = now
            $table->decimal('total', 15, 2); // tổng giá trị đơn hàng
            $table->string('shipping_address'); // địa chỉ giao hàng
            $table->string('phone_number'); // số điện thoại nhận hàng
            $table->enum('status', ['pending', 'approved'])->default('pending'); // trạng thái
            $table->timestamps(); // created_at và updated_at

            // Khóa ngoại liên kết tới bảng customers
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
