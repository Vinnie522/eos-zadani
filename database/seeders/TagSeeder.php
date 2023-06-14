<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $tags = [
            ['nazev' => 'Muz'],
            ['nazev' => 'Zena']
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
