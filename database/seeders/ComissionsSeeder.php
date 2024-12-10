<?php

namespace Database\Seeders;

use App\Models\Affiliate;
use App\Models\Comission;
use Illuminate\Database\Seeder;

class ComissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Affiliate::all()->each(function ($affiliate) {
            Comission::factory()->count(5)->create([
                'affiliate_id' => $affiliate->id,
            ]);
        });
    }
}
