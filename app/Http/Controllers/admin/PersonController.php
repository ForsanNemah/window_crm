<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\person;
use App\Http\Requests\StoreDemoRequest;
use App\Http\Requests\UpdateDemoRequest;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persons =person::latest()->paginate(5);
       // return $persons; 
      
        return view('admin.persons.index',compact('persons'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.persons.create');
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

        $request->validate([
            'name' => 'required',
            'phn' => 'required',
            'note' => 'required',
        ]);
      
        person::create($request->all());
       
        return redirect()->route('persons.index')
                        ->with('success','person created successfully.');
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
    public function edit(person $person)
    {
        //
       // echo $person;
       return view('admin.persons.edit',compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDemoRequest  $request
     * @param  \App\Models\Demo  $demo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDemoRequest $request, person $person)
    {
        //





        $request->validate([
            'name' => 'required',
            'phn' => 'required',
            'note' => 'required',
        ]);
      
        $person->update($request->all());
      
        return redirect()->route('persons.index')
                        ->with('success','person updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demo  $demo
     * @return \Illuminate\Http\Response
     */
    public function destroy(person $person)
    {
        //
        $person->delete();
       
        return redirect()->route('persons.index')
                        ->with('success','person deleted successfully');
    }
}
