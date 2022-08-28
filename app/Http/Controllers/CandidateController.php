<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Election;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    public function registerCandidate(){
        $positions = Position::all();
        return view('election.candidate.register-candidate', compact('positions'));
    }

    public function saveRegisteredCandidate(Request $request){
        $election = Election::latest()->first();

        $election_id = $election->id;
        $position_id = $request->position;
        $user_id = Auth::user()->id;

        Candidate::create([
            'election_id' => $election_id,
            'position_id' => $position_id,
            'user_id' => $user_id
        ]);

        return redirect('/home');
    }
}
