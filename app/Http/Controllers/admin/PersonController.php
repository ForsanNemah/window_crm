<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\person;
use App\Models\User;
use App\Models\department;
use App\Http\Requests\StoreDemoRequest;
use App\Http\Requests\UpdateDemoRequest;
use DB;
use Auth;
class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$persons =person::latest()->paginate(10);
       // return $persons; 
      

       $persons_collection =DB::select('select persons.* ,users.name as user_name from persons,users where users.id=persons.user_id  order by persons.id desc  ');
    
       $persons=  collect( $persons_collection )->paginate(10 );






        return view('admin.persons.index',compact('persons'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
    }
    



    public function make_excel()
    {
        $persons =person::get();
        header("Content-Type: application/vnd.ms-excel");

        echo ' Name' . "\t" . 'service' . "\t" . 'Phone' . "\n";

        foreach($persons as $r){

         

//echo $r->name;
echo $r->name . "\t" . $r->service. "\t" .  $r->phn . "\n";





        }
        header("Content-disposition: attachment; filename=full_leads_report.xls");
      // return $persons; 
      

            
    }












    public function index_reports()
    {
   




if(Auth::user()->user_type=='admin'){

    $persons =DB::select('
        
        
        
    SELECT persons.*,users.name as user_name from persons,users  where   users.id=persons.user_id order by id desc

    
    ');

}
else{

    $persons =DB::select('
        
        
        
    SELECT persons.*,users.name as user_name from persons,users  where users.department=? and users.id=persons.user_id order by id desc

    
    ',[Auth::user()->department]);






}











 
        foreach($persons as $r){
           // echo $r->id."<br>";

           $r->state="";
            $fu =DB::select('select id,lead_id,state from follow_ups where lead_id=? ORDER by id DESC LIMIT 1',[ $r->id]);

            foreach($fu as $r2){
//echo $r2->state;

$r->state=$r2->state;

            }
     

        }




       //return $persons; 




       $users =User::get();
       //return $users; 


      
      return view('admin.reports.index',compact('persons','users'))
          ->with('success','person created successfully.');
          


           
            
    }


















    public function persons_search(StoreDemoRequest $request)
    {

        $persons =person::where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->search_key)) {
                    $query->orWhere('phn', 'LIKE', '%' . $s . '%')
                       
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




    public function persons_search_with_filter(StoreDemoRequest $request)
    {

        $myq="select persons.*,users.name as user_name from persons,users where 1 ";

//echo $request->from;
//echo $request->to;
//echo $request->service;
//echo $request->state;


if($request->filled('service')){


    $myq=$myq." and  service='".$request->service."'";
 



}

/*
if($request->filled('state')){


    $myq=$myq." where state=".$request->service;
 




}
*/





if($request->filled('from') and $request->filled('to')   ){


    $myq=$myq." and created_at between '".$request->from."' and '".$request->to."'   ";  
 



}






if($request->filled('state')){


    $myq=$myq." and state = '".$request->state."'";  
 



}


if($request->filled('user_id')){


    $myq=$myq." and users.id = '".$request->user_id."'";  
 



}















echo  $myq;

if(Auth::user()->user_type=='1'){

    $myq=$myq." and  department='". Auth::user()->department."'";
}




$myq=$myq."and users.id=persons.user_id order by id desc";

//$leads =DB::select('select * from  persons where created_at BETWEEN ? AND ? ',["'".$request->from."'","'".$request->to."'"]);
//return  $leads; 

$persons =DB::select($myq);



foreach($persons as $r){
    // echo $r->id."<br>";

    $r->state="";
     $fu =DB::select('select id,lead_id,state from follow_ups where lead_id=? and state=? ORDER by id DESC LIMIT 1',[ $r->id
    
    
    ,$request->state
    
    ]);

     foreach($fu as $r2){
//echo $r2->state;

$r->state=$r2->state;

     }


 }












 $users =User::get();

//return $persons; 
 

return view('admin.reports.index',compact('persons','users'))
->with('success','person created successfully.');


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
       return view('admin.persons.create',compact('departments'));
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
             
        ]);



        $data=$request->all();



        $data['user_id']= Auth::id();
        
 
        person::create($data);
       
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
       $departments =department::get();
       return view('admin.persons.edit',compact('person','departments'));
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
            
        ]);
      
         echo $person->update($request->all());
      
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
