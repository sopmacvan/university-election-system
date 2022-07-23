<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('candidates')->truncate();
        $position_count = Position::count() + 1;
        $user_id = 1;

        //create 2 candidates per position
        for ($position_id = 1; $position_id < $position_count; $position_id++) {
            for ($j = 0; $j < 2; $j++) {
                Candidate::create([
                    'user_id' => $user_id,
                    'position_id' => $position_id,
                    'election_id' => 1,
                ]);
                $user_id += 1;

            }
        }
    }
}
