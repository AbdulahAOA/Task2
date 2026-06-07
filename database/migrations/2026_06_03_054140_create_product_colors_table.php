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
    Schema::create('product_colors', function (Blueprint $table) {

       
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

            $table->unique([
    'product_id',
    'color_id'
]);

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
        Schema::dropIfExists('product_colors');
    }
};
