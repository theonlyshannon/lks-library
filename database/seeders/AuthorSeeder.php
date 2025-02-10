<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\AuthorFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AuthorFactory::new()->count(10)->create();
    }
}
