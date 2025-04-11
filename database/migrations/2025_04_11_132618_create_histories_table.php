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
        Schema::create('histories', function (Blueprint $table) {
            $table->id(); 
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->datetime('tanggal_prediksi')->useCurrent();
            $table->integer('persentase_depresi')->nullable();
            $table->integer('qty_positif')->nullable();
            $table->integer('qty_negatif')->nullable();
            $table->integer('qty_netral')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};