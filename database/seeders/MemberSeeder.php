<?php

namespace Database\Seeders;
use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::create([
            'jmeno' => 'Petr',
            'prijmeni' => 'Sveceny',
            'email' => 'petr.sveceny@example.com',
            'narozeni' => '1999-01-01',
        ]);

        Member::create([
            'jmeno' => 'Jaromir',
            'prijmeni' => 'Bosak',
            'email' => 'jarda.bosak@example.com',
            'narozeni' => '1990-02-02',
        ]);
    }
}
