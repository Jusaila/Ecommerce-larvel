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
        Schema::create('testomonials', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->string('content');
            $table->string('image');
            $table->string('name');
            $table->string('designation');
            $table->enum('status',['Active','inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testomonials');
    }
};
