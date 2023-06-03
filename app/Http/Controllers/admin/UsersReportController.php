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
use Session;
class UsersReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        echo "wwe";

        /*
        $persons =person::latest()->paginate(5);
       // return $persons; 
      

       $persons_collection =DB::select('select persons.* ,users.name as user_name from persons,users where users.id=persons.user_id   ');
    
       $persons=  collect( $persons_collection )->paginate(10 );






        return view('admin.persons.index',compact('persons'))
            ->with('i', (request()->input('page', 1) - 1) * 5);


            */






            return view('admin.users_reports.index',compact('persons') )
            ->with('i', (request()->input('page', 1) - 1) * 5);







            
    }
    

































    public function index_id($id)
    {


        //echo "wwe";
        //echo $id;


        //echo $id; 
        Session::put('id', $id);

        echo Session::get('id');
















        /*
        $persons =person::latest()->paginate(5);
       // return $persons; 
      

       $persons_collection =DB::select('select persons.* ,users.name as user_name from persons,users where users.id=persons.user_id   ');
    
       $persons=  collect( $persons_collection )->paginate(10 );






        return view('admin.persons.index',compact('persons'))
            ->with('i', (request()->input('page', 1) - 1) * 5);


            */






            //return view('admin.users_reports.index'  )
            //->with('i', (request()->input('page', 1) - 1) * 5);






            return view('admin.users_reports.index' )
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
        
        
        
    SELECT persons.*,users.name as user_name from persons,users  where department=? and users.id=persons.user_id order by id desc

    
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




    public function users_report_filter(StoreDemoRequest $request)
    {






        if($request->action==1){
 
 
          echo "no of leads ";
         
          $myq="select  persons.*,users.name as user_name  from persons,users  where persons.user_id=users.id and   persons.user_id= ".Session::get('id');

   











          if($request->filled('from') and $request->filled('to')   ){


            $myq=$myq." and persons.created_at between '".$request->from."' and '".$request->to."'   ";  
         
        
        
        
        }
        







        $persons_collection =DB::select($myq);
        $persons=  collect($persons_collection)->paginate( 20 );

          return view('admin.persons.index',compact('persons'))
          ->with('i', (request()->input('page', 1) - 1) * 20);
        
        
        }


        if($request->action==2){
 
 
            echo "no of quotations ";
           
          







           
         
            $myq="select quotation.*,persons.service,persons.name from quotation,persons where quotation.lead_id=persons.id        and persons.user_id= ".Session::get('id');
  
     
  
  
  
  
  
  
  
  
  
  
  
            if($request->filled('from') and $request->filled('to')   ){
  
  
              $myq=$myq." and quotation.created_at between '".$request->from."' and '".$request->to."'   ";  
           
          
          
          
          }
          
  
  
  
  
  
  
  
          $quotations_collection =DB::select($myq);
          $quotations=  collect($quotations_collection)->paginate( 20 );
  
          return view('admin.quotation.index',compact('quotations'))->with('i', (request()->input('page', 1) - 1) * 20);















          
          
          }






          if($request->action==3){
 
 
        
           
          
            echo "no of leads ";
         
            $myq="select * from follow_ups where user_id= ".Session::get('id');
  
     
  
  
  
  
  
  
  
  
  
  
  
            if($request->filled('from') and $request->filled('to')   ){
  
  
              $myq=$myq." and follow_ups.created_at between '".$request->from."' and '".$request->to."'   ";  
           
          
          
          
          }
          
  
  
  
  
  

  
          $followups_collection =DB::select($myq);
          $follow_ups=  collect($followups_collection)->paginate( 20 );
  
//echo count( $followups);
          
            return view('admin.users_reports.user_followups',compact('follow_ups'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
        

            

        
          
          
          }































          if($request->action==4){
 
 
        
           
          
            echo "no of leads ";
         
            $myq="select * from follow_ups where 	state='sold' and user_id= ".Session::get('id');
  
     
  
  
  
  
  
  
  
  
  
  
  
            if($request->filled('from') and $request->filled('to')   ){
  
  
              $myq=$myq." and follow_ups.created_at between '".$request->from."' and '".$request->to."'   ";  
           
          
          
          
          }
          
  
  
  
  
  

  
          $followups_collection =DB::select($myq);
          $follow_ups=  collect($followups_collection)->paginate( 20 );
  
//echo count( $followups);
          
            return view('admin.users_reports.user_followups',compact('follow_ups'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
        

            

        
          
          
          }









  














       // $myq="select persons.*,quotation.*  from persons,quotation where  persons.id=quotation.lead_id and persons.user_id= ".Session::get('id');






/*
echo $request->to;
echo $request->from;
echo $request->action;
*/


//echo  $myq;

//$result =DB::select($myq);
//return $result;


/*


 echo "wwee";



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
 
 
 
 
 /*
 if($request->filled('from') and $request->filled('to')   ){
 
 
     $myq=$myq." and created_at between '".$request->from."' and '".$request->to."'   ";  
  
 
 
 
 }
 







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
