<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(10); // Paginate results (10 per page)
        return view('pages.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $request->validate([
            'project_name' => 'required|string|max:255|unique:projects',
            'description' => 'required',
            'visibility' => 'required|in:public,private',
        ]);

        Project::create($request->all());

        return redirect()->route('projects.index')->with('success', 'Project created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id); // Fetch the project by ID or fail with 404
        return view('pages.projects.edit', compact('project')); // Pass project data to the view
    }

    /**
     * Update the specified resource in storage.
     */
   // Handle the update request
   public function update(Request $request, $id)
   {
       // Validate the request data
       $request->validate([
           'project_name' => 'required|string|max:255',
           'description' => 'required|string',
           'visibility' => 'required|in:public,private',
       ]);

       // Find the project and update it
       $project = Project::findOrFail($id);
       $project->update($request->all());

       // Redirect to the project list with a success message
       return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
   }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
