<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->truncate();

        $positions = array(
            'president',
            'vice president',
            'secretary',
            'treasurer',
            'pro'
        );

        foreach ($positions as $position) {
            Position::create([
                'position_value' => $position
            ]);
        }
    }
}
