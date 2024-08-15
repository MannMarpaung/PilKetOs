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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('ketua_id');
            $table->foreign('ketua_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('wakil_id');
            $table->foreign('wakil_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('ketua_image');
            $table->string('wakil_image');
            $table->string('vision');
            $table->string('mission');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
