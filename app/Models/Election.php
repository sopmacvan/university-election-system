<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Election extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'starts_at',
        'ends_at',
        'election_status_id'
    ];

    public function status()
    {
        return $this->belongsTo(ElectionStatus::class, 'election_status_id');
    }

    public function getStatus()
    {
        return $this->status->status_value;
    }



}
