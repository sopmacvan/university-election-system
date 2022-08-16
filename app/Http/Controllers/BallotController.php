<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Election;
use App\Models\Position;
use App\Models\VotedCandidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BallotController extends Controller
{
    public function startVoting(Request $request){
        $election = Election::latest()->first();

        //        check if user already voted
        if ($this->voteExists($election->id)){
            $request->session()->flash('error', "You have already submitted votes.");
            return redirect()->back();

        };
        $positions = Position::all();
        $candidates = Candidate::where('election_id', $election->id)->get();
        $candidates_per_position = $this->getCandidatesPerPosition($candidates);
        return view('election.ballot.ballot-form', compact('positions', 'candidates_per_position'));
    }

    public function saveVote(Request $request){
        $election = Election::latest()->first();

        foreach ($request->voted_candidate as $vote){
            if (!is_null($vote)){
                VotedCandidate::create([
                    'user_id' => Auth::user()->id,
                    'candidate_id' => $vote,
                    'election_id' => $election->id,
                ]);
            }
        }
        return redirect('/home');
    }

    private function voteExists($election_id): bool
    {
        //check if user's vote exists
        $vote = VotedCandidate::where('user_id', Auth::user()->id)
            ->where('election_id', $election_id)
            ->first();

        return !is_null($vote);
    }
    public function showResultTally(){
        $election = Election::latest()->first();
        $positions = Position::all();

        $candidates = Candidate::where('election_id', $election->id)->get();
        $candidates_per_position = $this->getCandidatesPerPosition($candidates);

        return view('election.ballot.result', compact('positions', 'candidates_per_position'));
    }

    private function getCandidatesPerPosition($candidates): array
    {
        //group candidates by their registered position
        $president = array();
        $vice_president = array();
        $secretary = array();
        $treasurer = array();
        $pro = array();

        foreach ($candidates as $candidate){
            if ($candidate->registeredAs('president')){
                $president[] = $candidate;
            }
            elseif ($candidate->registeredAs('vice president')){
                $vice_president[] = $candidate;
            }
            elseif ($candidate->registeredAs('secretary')){
                $secretary[] = $candidate;
            }
            elseif ($candidate->registeredAs('treasurer')){
                $treasurer[] = $candidate;
            }
            elseif ($candidate->registeredAs('pro')){
                $pro[] = $candidate;
            }
        }
        return array(
            'president' => $president,
            'vice president' => $vice_president,
            'secretary' => $secretary,
            'treasurer' => $treasurer,
            'pro' => $pro);
    }
}
