<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\person;
use App\Models\emp;
use App\Models\User;
use App\Models\department;
use App\Http\Requests\StoreDemoRequest;
use App\Http\Requests\UpdateDemoRequest;
use Illuminate\Support\Facades\Hash;

class empController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emps =User::where('user_type','1')->latest()->paginate(5);

       // return $emps;
       
      
        return view('admin.emps.index',compact('emps'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
            
    }


    public function user_search(StoreDemoRequest $request)
    {

        $persons =User::where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->search_key)) {
                    $query->orWhere('name', 'LIKE', '%' . $s . '%')
                       
                        ->get();
                }
            }]
        ])->paginate(6);
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        //latest()->paginate(5);
        // return $persons; 
       
         return view('admin.persons.index',compact('persons'))
             ->with('i', (request()->input('page', 1) - 1) * 5);

        /*
        echo  "search called".$request->search_key;
        
        $persons =person::

        
        
        where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->search_key)) {
                    $query->orWhere('name', 'LIKE', '%' . $s . '%')
                      
                        ->get();
                }
            }]
        ])->latest()->paginate(5);
       // return $persons; 
      
        return view('admin.persons.index',compact('persons'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
           */ 
    }












    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

       $departments =department::get();
      
       // return view('admin.persons.create',compact('departments','sex'));
       return view('admin.emps.create',compact('departments'));
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
            'name' => ['required','unique:users'],
            'email' => ['required','unique:users'],
            'password' => 'required',
            'department' => 'required',


           
        ]);
      

        $data = $request->all();

        $data['password']=Hash::make($data['password']);

        $data['user_type']="1";
        User::create($data );
       
        return redirect()->route('emps.index')
                        ->with('success','emp. created successfully.');
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
    public function edit(User $emp)
    {

        //echo $emp;
        //
       // echo $person;
       
       $departments =department::get();
       return view('admin.emps.edit',compact('emp','departments'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDemoRequest  $request
     * @param  \App\Models\Demo  $demo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDemoRequest $request, User $emp)
    {
        //

//print($request->all());



       
      
        $emp->update($request->all());
      
        return redirect()->route('emps.index')
                        ->with('success','emp updated successfully');
                        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demo  $demo
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $emp)
    {


      //  echo $emp;
        //
        
        $emp->delete();
       
        return redirect()->route('emps.index')
                        ->with('success','emp. deleted successfully');
                        
    }
}
