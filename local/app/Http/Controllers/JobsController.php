<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JOB;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = JOB::all();
        return view('admin.jobs')->with('jobs',$jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_job');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job = new JOB();
        $job->title = $request->input('title');
        $job->expiry_date = $request->input('expiry_date');
        $job->description = $request->input('description');
        $job->save();
        return Redirect()->route('jobs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = JOB::findOrFail($id);
        return view('admin.edit_job')->with('job',$job);
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
        $job = JOB::findOrFail($id);
        $job->title = $request->input('title');
        $job->expiry_date = $request->input('expiry_date');
        $job->description = $request->input('description');
        $job->save();
        return Redirect()->route('jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobs = JOB::findOrFail($id);
        $jobs->delete();
        return Redirect()->route('jobs.index');
    }
}
