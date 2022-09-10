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
            $start_date = $election->starts_at;
            $end_date = $election->ends_at;
            return view('election.scheduled', compact(['start_date', 'end_date']));
        }
        if ($status == 'ongoing') {
            return view('election.ongoing');
        }
        if ($status == 'finished') {
            return view('election.finished');
        }
        return view('election.unscheduled');
    }

    public function saveCreatedElection(Request $request)
    {
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
    public function saveEditedElection(Request $request)
    {
        $election = Election::latest()->first();

        //convert to timestamp
        $start_date = strtotime($request->start_date);
        $end_date = strtotime($request->end_date);

        //convert dates format to y-m-d
        $start_date = date("Y-m-d", $start_date);
        $end_date = date("Y-m-d", $end_date);

        //update and save changes
        $election->starts_at = $start_date;
        $election->ends_at = $end_date;
        $election->save();

        return redirect('/home');

    }

    public function cancelElection()
    {
        $election = Election::latest()->first();
        $election->delete();

        return redirect('/home');
    }
}

