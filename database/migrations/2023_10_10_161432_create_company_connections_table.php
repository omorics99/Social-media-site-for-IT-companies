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
        Schema::create('company_connections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('first_company_id');
            $table->unsignedBigInteger('second_company_id');
            $table->timestamps();

            $table->foreign('first_company_id')->references('id')->on('companies');
            $table->foreign('second_company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_connections');
    }
};
