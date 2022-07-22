<?php

namespace Database\Seeders;

use App\Models\ElectionStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ElectionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('election_statuses')->truncate();

        $statuses = array('scheduled', 'ongoing', 'finished', 'canceled');
        foreach ($statuses as $status) {
            ElectionStatus::create([
                'status_value' => $status
            ]);
        }
    }
}
