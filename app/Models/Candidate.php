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

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function countVotes()
    {
        return $this->hasMany(VotedCandidate::class)->count();
    }

    public function registeredAs($position)
    {
        return $this->position->position_value == $position;
    }

    public function getName(){
        return $this->user->name;
    }
}
