<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue',
        'note',
        'priority_level',
        'status',
        'due_at',
        'assign_id'
    ];
}
