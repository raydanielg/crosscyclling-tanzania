<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'name' => 'Mwanza Community Ride',
                'description' => 'Safari ya jamii kwa waendesha baiskeli wote—salama, ya kufurahisha, na yenye kuunganisha wadau.',
                'image_path' => 'images/Highlights/DEE_1029.jpg',
                'status' => 'open',
                'application_status' => 'open',
                'distance_km' => 45,
                'location' => 'Mwanza',
                'route' => 'Kiloleli - Kiseke',
                'slots_total' => 120,
                'slots_remaining' => 34,
                'starts_at' => now()->addDays(10)->setTime(6, 30),
            ],
            [
                'name' => 'Dar City Sprint',
                'description' => 'Mashindano ya kasi ya mjini yenye checkpoints, timing, na utoaji wa zawadi.',
                'image_path' => 'images/Highlights/DEE_1154.jpg',
                'status' => 'planned',
                'application_status' => 'not_open',
                'distance_km' => 20,
                'location' => 'Dar es Salaam',
                'route' => 'Mbezi - Kawe',
                'slots_total' => 80,
                'slots_remaining' => 80,
                'starts_at' => now()->addDays(25)->setTime(7, 0),
            ],
            [
                'name' => 'Arusha Highland Challenge',
                'description' => 'Challenge ya endurance yenye mwinuko—kwa wapenzi wa milima na performance.',
                'image_path' => 'images/Highlights/DEE_1219.jpg',
                'status' => 'closed',
                'application_status' => 'closed',
                'distance_km' => 68,
                'location' => 'Arusha',
                'route' => 'Njiro - Usa River',
                'slots_total' => 150,
                'slots_remaining' => 0,
                'starts_at' => now()->subDays(7)->setTime(6, 0),
            ],
        ];

        foreach ($events as $e) {
            Event::updateOrCreate(
                ['slug' => Str::slug($e['name'])],
                array_merge($e, ['slug' => Str::slug($e['name'])])
            );
        }
    }
}
