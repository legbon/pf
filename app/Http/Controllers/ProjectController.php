<?php

namespace App\Http\Controllers;

use Redirect;
use App\Project;
use Illuminate\Http\Request;

use App\Legbon\Repositories\ProjectEloquentRepository;
use App\Legbon\Portfolio\Project\ProjectHelper;
use App\Legbon\Portfolio\Project\ProjectRepositoryInterface;

class ProjectController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = Project::where('deleted', false)->get();
        return view('projects.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $data['user_id'] = \Auth::id();
        $helper = new ProjectHelper();
        $project = $helper->createProject($data, new ProjectEloquentRepository);
        
        if(!$project) {
            $msg = 'Something went wrong with project creation.';
            $request->session()->flash('admin_status', $msg);
            return Redirect::back();
        }

        $msg = $project->title." successfully created.";
        $request->session()->flash('admin_status', $msg);
        // return Redirect::route('projects.show', ['slug' => $project->slug]);
        return Redirect::route('projects.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $project = Project::where('slug', $slug)->first();

        return $project;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        return view('projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
        $data = $request->all();
        $data['id'] = $project->id;
        $helper = new ProjectHelper();
        $project = $helper->updateProject($data, new ProjectEloquentRepository);
        
        if(!$project) {
            $msg = 'Something went wrong with the project update.';
            $request->session()->flash('admin_status', $msg);
            return Redirect::back();
        }

        $request->session()->flash('admin_status', "Successfully updated project!");
        //return Redirect::route('projects.show', ['slug' => $project->slug]);
        return Redirect::route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Request $request)
    {
        //
        
        $helper = new ProjectHelper();
        $project = $helper->delete($project->id, new ProjectEloquentRepository);

        $request->session()->flash('admin_status', "Successfully deleted project ". $project->title ."!");
        return Redirect::route('projects.index');
    }
}
