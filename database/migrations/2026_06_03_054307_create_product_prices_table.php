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
    Schema::create('product_prices', function (Blueprint $table) {

     
        $table->id();

        /*
        |--------------------------------------------------------------------------
        | Relations
        |--------------------------------------------------------------------------
        */
        $table->foreignId('product_id')
            ->constrained('products');

        $table->foreignId('size_id')
            ->constrained('sizes');
            $table->unique([
    'product_id',
    'size_id'
]);

        /*
        |--------------------------------------------------------------------------
        | Pricing
        |--------------------------------------------------------------------------
        */
        $table->decimal('price', 10, 2);

        /*
        |--------------------------------------------------------------------------
        | Sale Information
        |--------------------------------------------------------------------------
        | 1 => On Sale
        | 2 => Not On Sale
        |--------------------------------------------------------------------------
        */
        $table->tinyInteger('on_sale_status')
            ->default(2);

        $table->decimal('after_sale_price', 10, 2)
            ->nullable();

        /*
        |--------------------------------------------------------------------------
        | Audit Information
        |--------------------------------------------------------------------------
        */
        $table->unsignedBigInteger('created_by');

       
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_prices');
    }
};
