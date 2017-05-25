<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Http\Request;
use Redirect;
use \App\Legbon\Portfolio\Plan\PlanHelper;
use \App\Legbon\Portfolio\Plan\PlanRepositoryInterface;
use \App\Legbon\Repositories\PlanEloquentRepository;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $plans = Plan::where('deleted', false)->get();
        return view('plans.index', ['plans' => $plans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('plans.create');
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
        $repo = new PlanHelper();
        $data = $request->all();
        $data['user_id'] = \Auth::id();

        $data = $repo->processPlan($data);

        if($data == false) {
            $msg = 'Processing plan failed. Please check your input.';
            $request->session()->flash('admin_status', $msg);

            return Redirect::back();
        }

        $plan = $repo->save($data, new PlanEloquentRepository);
        
        if($plan == false) {
            $msg = 'Something went wrong with the plan save function.';
            $request->session()->flash('admin_status', $msg);
            return Redirect::back();
        }


        $msg = 'Successfully created plan '. $plan['title'] .'.';
        $request->session()->flash('admin_status', $msg);

        return Redirect::route('plans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        //
    }
}
