<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        RoleSeeder::run();
        UserRoleSeeder::run();
        ArticleSeeder::run();
        MessageSeeder::run();
        NewsSeeder::run();
    }
}
