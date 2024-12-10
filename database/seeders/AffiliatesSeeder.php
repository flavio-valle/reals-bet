<?php

namespace Database\Seeders;

use Database\Factories\AffiliateFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AffiliatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AffiliateFactory::new()->count(10)->create();
    }
}
