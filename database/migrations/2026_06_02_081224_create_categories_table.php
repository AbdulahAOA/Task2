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
    Schema::create('categories', function (Blueprint $table) {

        $table->id();

        // Parent category reference for sub-categories
        $table->foreignId('parent_category_id')
            ->nullable()
            ->constrained('categories')
            ->nullOnDelete();

        $table->string('name_ar');
        $table->string('name_en');

         /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        | 1 => Active
        | 2 => Inactive
        |--------------------------------------------------------------------------
        */
        $table->tinyInteger('status')->default(1);
  /*
        |--------------------------------------------------------------------------
        | Audit Fields
        |--------------------------------------------------------------------------
        */
        $table->unsignedBigInteger('created_by');

        $table->unsignedBigInteger('updated_by')
            ->nullable();
            
            $table->softDeletes();

        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
