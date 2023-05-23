<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin/index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *  
     */
    public function store(Request $request)
    {
        $this->validation($request);
        $formData = $request->all();

        $project = new Project();

        $project->name = $formData['name'];
        $project->description = $formData['description'];
        $project->github_link = $formData['github_link'];
        $project->languages = $formData['languages'];
        $project->slug = Str::slug($formData['name'], '-');

        $project->save();

        return  redirect()->route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin/show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin/edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validation($request);

        $formData = $request->all();
        $project->update($formData);
        $project->save();

        return redirect()->route('admin.projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }

    public function validation($request)
    {
        $formData = $request->all();
        $validator = Validator::make($formData, [
            'name' => 'required|max:100',
            'description' => 'required|max:255',
            'github_link' => 'required|max:255',
            'languages' => 'required|max:100'
        ], [
            'name.required' => 'Devi inserire il titolo',
            'description.required' => 'Inserisci una breve descrizione',
            'github_link.required' => "E' necessario allegare il link di github",
            'languages.required' => 'Inserire almeno un linguaggio di quelli utilizzati',
        ])->validate();

        return $validator;
    }
}
