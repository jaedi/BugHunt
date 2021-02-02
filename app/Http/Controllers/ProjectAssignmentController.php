<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\ProjectAssignment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProjectAssignmentController extends Controller
{
    public function getUsersByPosition()
    {
        return Project::all();
        // return Project::onlyTrashed()->get();
        // return response()->json('Success HAHAHAHA');
    }

    public function getProjects()
    {
        return Project::all();
        // return Project::onlyTrashed()->get();
        // return response()->json('Success HAHAHAHA');
    }
    public function getAllAssigned()
    {
        return DB::table('project_assignments')
                    ->join('users', 'users.id', '=', 'project_assignments.user_id')
                    ->join('projects', 'projects.id', '=', 'project_assignments.project_id')
                    ->select(
                        'project_assignments.*',
                        'users.last_name', 'users.first_name', 'users.position',
                        'projects.project', 'projects.description', 'projects.category', 'projects.status'
                        )->get();
       
    }
    public function assignProject(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric|max:50',
            'project_id' => 'required|numeric|max:50',
        ]);
       $project = ProjectAssignment::create($request->all());
        
        // return redirect()->route('projects.index')
        //     ->with('success', 'Project Created successfully.');
        return response()->json(['message' => 'Project Assigned']);
       
    }
}
