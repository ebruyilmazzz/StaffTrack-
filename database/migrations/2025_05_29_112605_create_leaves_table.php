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
        Schema::create('leaves', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); // personelin id'si
        $table->string('leave_type'); // yıllık, hastalık, mazeret vb.
        $table->date('start_date');
        $table->date('end_date');
        $table->text('description')->nullable();
        $table->enum('status', ['Beklemede', 'Onaylandı', 'Reddedildi'])->default('Beklemede');
        $table->timestamps();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
