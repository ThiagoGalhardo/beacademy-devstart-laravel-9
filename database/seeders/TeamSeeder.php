<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Team::factory()->create([
            'name' => 'TECNOLOGIA',
        ]);

        \App\Models\Team::factory()->create([
            'name' => 'RH',
        ]);

        \App\Models\Team::factory()->create([
            'name' => 'FINANCEIRO',
        ]);

        \App\Models\Team::factory()->create([
            'name' => 'MARKETING',
        ]);
    }
}
