<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Election;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

}

