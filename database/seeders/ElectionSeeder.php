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

        $today_date = Carbon::now();
        Election::create([
            'starts_at' => $today_date->addDay(7),
            'ends_at' => $today_date->addDay(14),
            'election_status_id' => 1
        ]);
    }
}
