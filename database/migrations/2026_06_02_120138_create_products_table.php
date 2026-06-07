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
    Schema::create('products', function (Blueprint $table) {

        /*
        |--------------------------------------------------------------------------
        | Primary Key
        |--------------------------------------------------------------------------
        */
        $table->id();

        /*
        |--------------------------------------------------------------------------
        | Category
        |--------------------------------------------------------------------------
        */
        $table->foreignId('category_id')
            ->constrained('categories');

        /*
        |--------------------------------------------------------------------------
        | Product Information
        |--------------------------------------------------------------------------
        */
        $table->string('name_ar');
        $table->string('name_en');

        $table->text('description_ar')
            ->nullable();

        $table->text('description_en')
            ->nullable();

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

        $table->unsignedBigInteger('updated_by')
            ->nullable();

        /*
        |--------------------------------------------------------------------------
        | Timestamps & Soft Deletes
        |--------------------------------------------------------------------------
        */
        $table->timestamps();
        $table->softDeletes();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
