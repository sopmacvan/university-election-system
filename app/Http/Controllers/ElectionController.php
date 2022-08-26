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

    public function cancelElection(){
        $election = Election::latest()->first();
        $election->election_status_id = 4;

        $election->save();

        return redirect('/home');
    }
}

