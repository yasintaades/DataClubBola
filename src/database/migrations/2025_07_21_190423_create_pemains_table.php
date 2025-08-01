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
        Schema::create('pemains', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('position');
    $table->unsignedInteger('number');
    $table->date('birthdate');
    $table->foreignId('club_id')->constrained('klubs')->onDelete('cascade');
     $table->text('medical_record')->nullable(); 
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemains');
    }
};