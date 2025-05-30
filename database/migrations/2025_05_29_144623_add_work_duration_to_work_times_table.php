<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('work_times', function (Blueprint $table) {
        $table->float('work_duration')->nullable(); // veya decimal, integer — sana uygun olan neyse
    });
}

public function down()
{
    Schema::table('work_times', function (Blueprint $table) {
        $table->dropColumn('work_duration');
    });
}

};
