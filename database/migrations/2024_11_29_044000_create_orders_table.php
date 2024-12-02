<?php

use App\Enums\OrderStatus;
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
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->string('code', 6)->index()->unique();
            $table->unsignedBigInteger('total_price')->comment('Store as satang unit');
            $table->unsignedTinyInteger('status')
                ->default(OrderStatus::DRAFT->value)
                ->comment('0 as draft status. 10 as processing status. 20 as completed status');
            $table->dateTime('ordered_at')->nullable();
            $table->string('address');
            $table->string('subdistrict');
            $table->string('district');
            $table->string('province');
            $table->string('zipcode');
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
