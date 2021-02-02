<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

   

    protected $fillable = [
        'project',
        'description',
        'category',
        'status',
        'due_at',
    ];

    protected $dates = ['deleted_at'];
}
