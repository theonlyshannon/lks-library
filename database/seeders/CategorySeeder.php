<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryFactory::new()->count(10)->create();
    }
}
