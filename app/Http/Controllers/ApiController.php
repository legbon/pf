<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Plan;

class ApiController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
    	$projects = Project::where('deleted', false)->get();
//    	$plans = Plan::where('deleted', false)->get();

    	$data = [
    		'projects' => $projects,
  //  		'plans' => $plans
    	];
      return $data;
    }

}
