<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\PublisherFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PublisherFactory::new()->count(10)->create();
    }
}
