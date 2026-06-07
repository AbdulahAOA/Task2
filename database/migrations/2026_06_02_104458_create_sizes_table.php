<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::create('sizes', function (Blueprint $table) {

        /*
        |--------------------------------------------------------------------------
        | Primary Key
        |--------------------------------------------------------------------------
        */
        $table->id();

        /*
        |--------------------------------------------------------------------------
        | Size Information
        |--------------------------------------------------------------------------
        */
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
};
