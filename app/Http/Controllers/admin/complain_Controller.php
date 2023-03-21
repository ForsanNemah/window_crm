<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\person;
use App\Models\emp;
use App\Models\User;
use App\Models\follow_up;
use App\Models\department;
use App\Models\Complain;
use App\Http\Requests\StoreDemoRequest;
use App\Http\Requests\UpdateDemoRequest;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
use Session;

class complain_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(  )
    {





//,[$emp_id,$date]

       



 
$complaints_logs =DB::select('select * from complaints');


//return  $complaints_logs;
 
return view('admin.complain.index',compact('complaints_logs'));








/*


        $follow_ups = User::join('follow_ups', 'users.id', '=', 'follow_ups.user_id')
        ->select('users.*','follow_ups.*')
        ->get();
      
       return view('admin.follow_up.index',compact('follow_ups'));


/*
        $follow_ups =follow_up::latest()->paginate(5);

        // return $emps;
        
       
         return view('admin.follow_up.index',compact('follow_ups'))
             ->with('i', (request()->input('page', 1) - 1) * 5);

             */
            
            
    }












    public function index_id( $id)
    {
        echo $id; 
        Session::put('id', $id);


        $person =DB::select('select * from persons where id=? ',[  Session::get('id')]);

        $complaints_logs =DB::select('select * from complaints,users  where complaints.lead_id=? and complaints.lead_id=users.id ORDER BY complaints.id desc ',[$id]);



 
        return view('admin.complain.index',compact('complaints_logs','person'));













/*
        $follow_ups = User::join('follow_ups', 'users.id', '=', 'follow_ups.user_id')
        ->select('users.*','follow_ups.*')
        ->get();
      
       return view('admin.follow_up.index',compact('follow_ups'));


/*

        $follow_ups = User::join('follow_ups', 'users.id', '=', 'follow_ups.user_id')
        ->select('users.*','follow_ups.*')
        ->get();
       // ->paginate(5);

       //echo $follow_ups; 
       return view('admin.follow_up.index',compact('follow_ups'));


        
/*



   return view('admin.follow_up.index',compact('follow_ups'))
            ->with('i', (request()->input('page', 1) - 1) * 5);






 
/*
        echo $id; 
        Session::put('id', $id);
        //echo Auth::id();

    
        $follow_ups =follow_up::latest()->paginate(5);

       // return $emps;
       
      
        return view('admin.follow_up.index',compact('follow_ups'))
            ->with('i', (request()->input('page', 1) - 1) * 5);


         
     */      
            
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
        $users =User::get();
      
   
       $departments =department::get();
      
       // return view('admin.persons.create',compact('departments','sex'));
       return view('admin.complain.create',compact('departments','users'));
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
       
$data=$request->all();



$data['user_id']= Auth::id();
$data['lead_id']= Session::get('id');



/*
$follow_ups =DB::select('update persons set state=? where id=?',[  

    $data['state']
    ,
    $data['lead_id']



]);
*/












    Complain::create( $data);



    return redirect()->route('complain_logs',Session::get('id'))
    ->with('success','log. created successfully.');

       /*
        return redirect()->route('complain_logs',Session::get('id'))
                        ->with('success','log. created successfully.');
                        */
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
