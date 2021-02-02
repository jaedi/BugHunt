<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return Project::all();
        // return Project::onlyTrashed()->get();
        // return response()->json('Success HAHAHAHA');
    }
    public function show($id)
    {
        //return $id;
        //return Project::find($id);

        $project = Project::findOrFail($id);
        return response()->json($project);
        //return view('edit', compact('student'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'project' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'status' => 'required|string|max:30',
            'due_at' =>'required|string|max:255',
        ]);
        
       $project = Project::create($request->all());
        
        // return redirect()->route('projects.index')
        //     ->with('success', 'Project Created successfully.');
        return response()->json(['message' => 'Success HAHAHAHA']);
    }


    public function update(Request $request, Project $project)
    {

        // $request->validate([
        //     'project' => 'required|string|max:255',
        //     'description' => 'required|string|max:255',
        //     'category' => 'required|string|max:255',
        //     'status' => 'required|string|max:30',
        //     'due_at' =>'required|string|max:255',
        // ]);
    
        $project->update($request->all());
    
        // return redirect()->route('project.index')
        //                 ->with('success','Product updated successfully');
        // return response()->json($project, 200);
        return response()->json(['project' => $project,'message' => 'Success HAHAHAHA']);
    }
    public function delete($id)
    {
            
            // return response()->json(null, 204);
            $project = Project::findorfail($id);
            if($project->delete()) {
                return response()->json(['message' => 'Deleted HAHAHAHA']);
            }
               
    }
}
