<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'CTCMS Launch Updates',
                'excerpt' => 'Taarifa fupi kuhusu uzinduzi wa mfumo na maboresho ya mwanzo kwa wanachama na wadau.',
                'content' => implode("\n\n", [
                    'CTCMS ni jukwaa la kisasa la kusimamia matukio ya baiskeli, wanachama, na wadau (sponsors/partners).',
                    'Lengo letu ni kurahisisha usajili, taarifa za matukio, ufuatiliaji wa ushiriki, na uwazi wa mawasiliano.',
                    'Endelea kutufuatilia kwa updates mpya, features, na matukio yanayokuja ndani ya mikoa mbalimbali.',
                ]),
                'image_path' => 'images/Highlights/DEE_1095.jpg',
                'published_at' => now()->toDateString(),
                'author_name' => 'CTCMS Team',
            ],
            [
                'title' => 'Community Ride: Safety Tips',
                'excerpt' => 'Mwongozo mfupi wa usalama kwa safari za pamoja—helmet, hydration, na sheria za barabarani.',
                'content' => implode("\n\n", [
                    'Safari za pamoja zinafurahisha, lakini usalama ni kipaumbele: helmet, taa, na reflective gear.',
                    'Hakikisha unafuata sheria za barabarani na unawasiliana na group kwa signals na spacing.',
                    'Kabla ya kuanza, hakikisha baiskeli iko tayari: brakes, tyres, chain, na hydration.',
                ]),
                'image_path' => 'images/Highlights/DEE_1146.jpg',
                'published_at' => now()->subDays(2)->toDateString(),
                'author_name' => 'Safety Desk',
            ],
            [
                'title' => 'Sponsors & Partners Spotlight',
                'excerpt' => 'Jinsi tunavyoshirikiana na wadau kuendeleza michezo ya baiskeli na matukio Tanzania.',
                'content' => implode("\n\n", [
                    'Wadau ni nguzo muhimu kwa ukuaji wa michezo ya baiskeli: miundombinu, usalama, na mafunzo.',
                    'CTCMS inasaidia kuonyesha mchango wa sponsors, kurahisisha ufuatiliaji wa ushirikiano, na reporting.',
                    'Karibu tushirikiane kujenga taifa lenye afya na burudani kupitia baiskeli.',
                ]),
                'image_path' => 'images/Highlights/DEE_1208.jpg',
                'published_at' => now()->subDays(5)->toDateString(),
                'author_name' => 'Partnership Desk',
            ],
        ];

        foreach ($posts as $p) {
            $slug = Str::slug($p['title']);
            BlogPost::updateOrCreate(
                ['slug' => $slug],
                array_merge($p, ['slug' => $slug])
            );
        }
    }
}
