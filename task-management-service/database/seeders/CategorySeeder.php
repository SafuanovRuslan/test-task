<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = date('Y-m-d H:i:s');
        DB::table('categories')->insert([
            [
                'name' => 'Баг',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Фича',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
