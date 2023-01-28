<?php

namespace App\Http\Controllers;

use App\Models\Demo;
use App\Http\Requests\StoreDemoRequest;
use App\Http\Requests\UpdateDemoRequest;

class DemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        echo "wwe";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDemoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDemoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demo  $demo
     * @return \Illuminate\Http\Response
     */
    public function show(Demo $demo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demo  $demo
     * @return \Illuminate\Http\Response
     */
    public function edit(Demo $demo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDemoRequest  $request
     * @param  \App\Models\Demo  $demo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDemoRequest $request, Demo $demo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demo  $demo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demo $demo)
    {
        //
    }
}
