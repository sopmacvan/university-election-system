<?php

namespace Database\Seeders;

use App\Models\Election;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ElectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('elections')->truncate();

        Election::create([
            'starts_at' => Carbon::now()->addDays(7),
            'ends_at' => Carbon::now()->addDays(14),
            'election_status_id' => 1
        ]);
    }
}
