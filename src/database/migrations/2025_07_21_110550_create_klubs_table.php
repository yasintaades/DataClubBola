<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('klubs', function (Blueprint $table) {
    $table->id(); // unsigned big int
    $table->string('name');
    $table->string('stadium');
    $table->string('city');
    $table->string('bank_account_number')->nullable();
    $table->timestamps();
});
    }

    public function down(): void {
        Schema::dropIfExists('klubs');
    }
};

