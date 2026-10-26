<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $this->renameClassrooms('TJKT', 'Animasi');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $this->renameClassrooms('Animasi', 'TJKT');
    }

    private function renameClassrooms(string $from, string $to): void
    {
        foreach ([1, 2, 3] as $number) {
            DB::table('classrooms')
                ->where('name', "{$from} {$number}")
                ->update(['name' => "{$to} {$number}"]);
        }
    }
};
