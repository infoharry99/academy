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
    Schema::table('products', function (Blueprint $table) {

        // NEW FIELDS
        $table->string('slug')->unique()->after('title');

        $table->decimal('sale_price', 10, 2)->nullable()->after('price');

        $table->integer('stock')->default(0)->after('sale_price');

        $table->string('sku')->nullable()->after('stock');

        $table->string('image')->nullable()->after('sku');

        $table->boolean('is_active')->default(1)->after('image');

        $table->boolean('is_featured')->default(0)->after('is_active');

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
