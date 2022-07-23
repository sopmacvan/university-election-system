<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\Position;
use App\Models\User;
use App\Models\VotedCandidate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VotedCandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

//    ugly code! watch out!
    public function run()
    {
        DB::table('voted_candidates')->truncate();

        $user_count = User::count() + 1;
        $position_ids = array(1, 2, 3, 4, 5);

//        make each user vote a random candidate of each position
        foreach ($position_ids as $p_id) {
            $candidates = Candidate::where('position_id', $p_id)->get(['id']);
            $candidate_ids = array();

//            convert candidate_ids into an array
            foreach ($candidates as $candidate) {
                $candidate_ids[] = $candidate->id;
            }

//            create vote
            for ($i = 1; $i < $user_count; $i++) {
                VotedCandidate::create([
                    'user_id' => $i,
                    'candidate_id' => $candidate_ids[array_rand($candidate_ids)],

                ]);
            }
        }
    }
}
