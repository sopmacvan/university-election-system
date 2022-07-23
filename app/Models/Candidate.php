<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'position_id',
        'election_id'
    ];

    public function countVotes()
    {
        return $this->hasMany(VotedCandidate::class)->count();
    }
}
