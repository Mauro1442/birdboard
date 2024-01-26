<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function store()
    {
        $attributes = request()->validate([ 
            'title' => 'required', 
            'description' => 'required'
        ]);

        Project::create($attributes + ['owner_id' => Auth::id()]);

        return redirect('/projects');
    }
}
