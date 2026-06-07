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
    Schema::create('product_variation_quantities', function (Blueprint $table) {

       
        $table->id();

        /*
        |--------------------------------------------------------------------------
        | Relations
        |--------------------------------------------------------------------------
        */
        $table->foreignId('product_id')
            ->constrained('products');

        $table->foreignId('color_id')
            ->constrained('colors');

        $table->foreignId('size_id')
            ->constrained('sizes');
            $table->unique([
    'product_id',
    'color_id',
    'size_id'
]);

        /*
        |--------------------------------------------------------------------------
        | Quantity Information
        |--------------------------------------------------------------------------
        */
        $table->integer('quantity');

        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        | 1 => Active
        | 2 => Inactive
        |--------------------------------------------------------------------------
        */
        $table->tinyInteger('status')
            ->default(1);

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
        Schema::dropIfExists('product_variation_quantities');
    }
};
