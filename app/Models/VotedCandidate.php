<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VotedCandidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'candidate_id',
        'election_id'
    ];
}
