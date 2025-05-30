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
        Schema::create('kustomers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik');
            $table->string('name');
            $table->string('telp');
            $table->string('email');
            $table->string('alamat');
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kustomers');
    }
};
