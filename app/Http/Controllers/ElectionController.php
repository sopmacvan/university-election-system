<?php

namespace App\Http\Controllers;

use App\Models\Election;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    public function showElectionStatus()
    {
        $election = Election::latest()->first();

        if (is_null($election)) {
            return view('election.unscheduled');
        }

        $status = $election->getStatus();

        if ($status == 'scheduled') {
            return view('election.scheduled');
        }
        if ($status == 'ongoing') {
            return view('election.ongoing');
        }
        if ($status == 'finished') {
            return view('election.finished');
        }
        return view('election.unscheduled');
    }

    public function createElection(){
        return view('election.create-new');
    }
    public function saveCreatedElection(Request $request){
        //convert to timestamp
        $start_date = strtotime($request->start_date);
        $end_date = strtotime($request->end_date);

        //convert dates format to y-m-d
        $start_date = date("Y-m-d", $start_date);
        $end_date = date("Y-m-d", $end_date);

        Election::create([
            'starts_at' => $start_date,
            'ends_at' => $end_date
        ]);

        return redirect('/home');
    }
}

