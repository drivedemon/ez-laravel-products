<?php

use App\Enums\CustomerGender;
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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date')->nullable();
            $table->unsignedTinyInteger('gender')->default(CustomerGender::MALE->value);
            $table->unsignedBigInteger('balance')->default(0);
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
        Schema::dropIfExists('customers');
    }
};
