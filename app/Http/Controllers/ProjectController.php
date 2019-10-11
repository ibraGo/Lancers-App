<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function index($userId)
    {
        $projects = Project::ofUser($userId)->latest()->get();

        return response()->json($projects);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'user_id' => 'required'
            ]);

        $project = Project::create($request->all());

        return response()->json($project, 201);
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);

        return response()->json($project);
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->update($request->all());

        return response()->json($project, 200);
    }

    public function destroy($id)
    {
        Project::destroy($id);

        return response()->json(null, 204);
    }
}
