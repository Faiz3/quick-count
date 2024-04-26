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
        Schema::create('data_suaras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('calon_rt_id')->constrained('calon_rts')->onUpdate('cascade')->onDelete('cascade');
            $table->string('no_rt');
            $table->string('no_urut');
            $table->string('jumlah_suara');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_suaras');
    }
};
