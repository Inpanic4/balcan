<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SqlFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // populate db from sql file
        $path = 'app/developer_docs/db_testing.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('db  seeded!');
    }
}
