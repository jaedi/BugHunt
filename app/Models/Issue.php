<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issue extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'issue',
        'note',
        'priority_level',
        'status',
        'due_at',
        'assign_id'
    ];

    protected $dates = ['deleted_at'];
}
