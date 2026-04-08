<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('chapters', function (Blueprint $table) {
            $table->unsignedInteger('order_number')->default(0)->after('formation_id');
        });

        $chaptersByFormation = DB::table('chapters')
            ->select('id', 'formation_id', 'created_at')
            ->orderBy('formation_id')
            ->orderBy('created_at')
            ->orderBy('id')
            ->get()
            ->groupBy('formation_id');

        foreach ($chaptersByFormation as $chapters) {
            foreach ($chapters->values() as $index => $chapter) {
                DB::table('chapters')
                    ->where('id', $chapter->id)
                    ->update(['order_number' => $index]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chapters', function (Blueprint $table) {
            $table->dropColumn('order_number');
        });
    }
};
