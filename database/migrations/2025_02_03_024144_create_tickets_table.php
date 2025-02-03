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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('group_name', 255);
            $table->unsignedBigInteger('category_id');
            $table->string('status', 50)->default('pending');
            $table->text('details');
            $table->unsignedBigInteger('handled_by')->nullable();
            $table->string('sender', 200);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('handled_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
