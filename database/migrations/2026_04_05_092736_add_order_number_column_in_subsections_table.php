<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('subsections', function (Blueprint $table) {
            $table->unsignedInteger('order_number')->after('name')->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('subsections', function (Blueprint $table) {
            $table->dropColumn('order_number');
        });
    }
};
