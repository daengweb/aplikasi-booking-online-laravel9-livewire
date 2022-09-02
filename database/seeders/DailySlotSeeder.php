<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DailySlot;

class DailySlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DailySlot::truncate();
        DailySlot::create([
            'name' => 'Pagi: 07:00 - 09:00',
            'quota' => 30,
            'is_active' => true,
        ]);
        DailySlot::create([
            'name' => 'Sore: 16:00 - 18:00',
            'quota' => 30,
            'is_active' => true,
        ]);
        DailySlot::create([
            'name' => 'Malam: 19:00 - 21:00',
            'quota' => 30,
            'is_active' => true,
        ]);
    }
}
