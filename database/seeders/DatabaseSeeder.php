<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('profile')->truncate();
        DB::table('alternatifs')->truncate();
        DB::table('kriteria')->truncate();
        DB::table('aspek')->truncate();
        DB::table('role')->truncate();

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            AlternatifSeeder::class,
            AspekSeeder::class,
            KriteriaSeeder::class,
            ProfileSeeder::class,

        ]);
        Schema::enableForeignKeyConstraints();
    }
}
