<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Project;

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

        return view( 'admin.projects.index', compact('projects') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'admin.projects.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /* validazione */
        $request->validate(
            [
                'title' => 'required|unique:projects|max:255',
            ],
            [
                'title.required' => 'Il titolo è obbligatorio',
                'title.unique' => 'Il titolo è già esistente',
                'title.max' => 'Il titolo non deve superare 255 caratteri',
            ]
        );

        $form_data = $request->all();

        /* trasformazione dello slug */
        $slug = Project::generateSlug( $request->title );
        $form_data['slug'] = $slug;

        /* creazione del project */
        $new_project = new Project();
        $new_project->fill( $form_data );

        /* salvataggio nel DB */
        $new_project->save();

        /* redirect */
        return redirect()->route( 'admin.projects.index' );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        
        return view( 'admin.projects.show', compact('project') );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        
        $project->delete();
        return redirect()->route('admin.projects.index');

    }
}
