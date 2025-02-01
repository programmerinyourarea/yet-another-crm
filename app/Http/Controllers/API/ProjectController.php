<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Enums\ProjectStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $projects = Project::all();
        return response()->json($projects, Response::HTTP_OK);
    }

    /**
     * Store a newly created project in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'user_id'     => 'required|exists:users,id',
            'client_id'   => 'required|exists:clients,id',
            'deadline_at' => 'required|date',
            'status'      => [
                'required',
                // Validate against enum values.
                Rule::in(array_map(fn($case) => $case->value, ProjectStatus::cases())),
            ],
        ]);

        $project = Project::create($validatedData);

        return response()->json($project, Response::HTTP_CREATED);
    }

    /**
     * Display the specified project.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Project $project)
    {
        return response()->json($project, Response::HTTP_OK);
    }

    /**
     * Update the specified project in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project       $project
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'title'       => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'user_id'     => 'sometimes|required|exists:users,id',
            'client_id'   => 'sometimes|required|exists:clients,id',
            'deadline_at' => 'sometimes|required|date',
            'status'      => [
                'sometimes',
                'required',
                Rule::in(array_map(fn($case) => $case->value, ProjectStatus::cases())),
            ],
        ]);

        $project->update($validatedData);

        return response()->json($project, Response::HTTP_OK);
    }

    /**
     * Remove the specified project from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
