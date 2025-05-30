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
        Schema::create('work_times', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('personnel_id'); // foreign key
                $table->date('date');
                $table->time('start_time');
                $table->time('end_time')->nullable();
                $table->timestamps();
        
                $table->foreign('personnel_id')->references('id')->on('personnel')->onDelete('cascade');
            });
    }
        
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_times');
    }
};
