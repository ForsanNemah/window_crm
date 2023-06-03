<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\person;
use App\Models\Quo;
use App\Models\department;
use App\Http\Requests\StoreDemoRequest;
use App\Http\Requests\UpdateDemoRequest;
use DB;
use Auth;
use Session;
use \Illuminate\Pagination\Paginator;
use App\Collection;
class quotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotations =Quo::latest()->paginate(5);
        //return $quotations; 
       

        return view('admin.quotation.index',compact('quotations'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
    }
    
    


    public function show_all_sells_orders()
    {
        $quotations_collection =DB::select('select quotation.*,persons.service,persons.name from quotation,persons where quotation.lead_id=persons.id   and quotation.quotation_state="sell_order"  order by id DESC    ');
    
        $quotations=  collect( $quotations_collection )->paginate( 5 );
        //return $quotations; 
       

        return view('admin.quotation.all_sells_orders',compact('quotations'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
    }



    public function index_id($id)
    {

        Session::put('id', $id);

        $quotations_collection =DB::select('select quotation.*,persons.service,persons.name from quotation,persons where quotation.lead_id=persons.id  and quotation.lead_id=?  order by id DESC ',[ Session::get('id')]);
    
        $quotations=  collect( $quotations_collection )->paginate( 5 );


        return view('admin.quotation.index',compact('quotations'))->with('i', (request()->input('page', 1) - 1) * 5);








          
        //$quotations =Quo::latest()->paginate(5);

        //$quotations_collection =DB::select('select * from quotation');
        //$quotations=  collect([ $quotations_collection ])->paginate( 5 );

        //return    $quotations; 


       // return view('admin.quotation.index',compact('quotations'))
       // ->with('i', (request()->input('page', 1) - 1) * 5);



        /*
        return view('admin.quotation.index',compact('quotations'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

/*
        $quotations =Quo::latest()->paginate(5);
          
        return view('admin.quotation.index',compact('quotations'))
            ->with('i', (request()->input('page', 1) - 1) * 5);



        //return    $quotations; 
        //echo $id;

        
        /*
        $quotations_collection =DB::select('select * from quotation');
        $quotations=  collect([ $quotations_collection ])->paginate( 5 );
        return    $quotations; 



      //  $quotations_collection  = Quo::join('users', 'users.id', '=', 'quotation.user_id')
               //->get(['users.id', 'quotation.*']);



/*
               $quotations_collection =DB::select('select * from quotation');












               $quotations=  collect([ $quotations_collection ])->paginate( 5 );

               return view('admin.quotation.index',compact('quotations'))
               ->with('i', (request()->input('page', 1) - 1) * 5);

              // return    $quotations; 

               /*
               return view('admin.quotation.index',compact('quotations'))
               ->with('i', (request()->input('page', 1) - 1) * 5);


        /*
        Session::put('id', $id);
        //$quotations= Quo::where('user_id',1)->paginate(5);
      
        $quotations = paginate::make(DB::select("select * from quotations"), 10);
      
        return view('admin.quotation.index',compact('quotations'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            */
            
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
   




if(Auth::user()->user_type=='1'){

    $persons =DB::select('
        
        
        
    SELECT * from persons where department=? order by id desc

    
    ',[Auth::user()->department]);

}
else{
    $persons =DB::select('
        
        
        
    SELECT * from persons  order by id desc

    
    ');

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







      
      return view('admin.reports.index',compact('persons'))
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

        $myq="select * from persons ";

//echo $request->from;
//echo $request->to;
//echo $request->service;
//echo $request->state;


if($request->filled('service')){


    $myq=$myq." where service='".$request->service."'";
 



}

/*
if($request->filled('state')){


    $myq=$myq." where state=".$request->service;
 




}
*/





if($request->filled('from')){


    $myq=$myq." and created_at between '2023-02-06' and '".$request->to."'";  
 



}






if($request->filled('state')){


    $myq=$myq." and state = '".$request->state."'";  
 



}








echo  $myq;

if(Auth::user()->user_type=='1'){

    $myq=$myq." and  department='". Auth::user()->department."'";
}




$myq=$myq." order by id desc";

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














//return $persons; 
 

return view('admin.reports.index',compact('persons'))
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

        //$departments =department::get();
      
       // return view('admin.persons.create',compact('departments','sex'));,compact('departments')
       return view('admin.quotation.create');
    }




    public function create_sales_order($quotation_id)
    {

        //echo $quotation_id;
        $quotations =Quo::where('id', '=',  $quotation_id)->get();
        //echo $quotations;

$quotation;
        foreach ($quotations as $key){
            
            $quotation=$key;

        }

//echo $quotation;

        //$departments =department::get();
      
       // return view('admin.persons.create',compact('departments','sex'));,compact('departments')
        return view('admin.quotation.sales_order',compact('quotation')  );
    }






























    
    




    public function create_invoice_order($quotation_id)
    {

        //echo $quotation_id;
        $quotations =Quo::where('id', '=',  $quotation_id)->get();
        //echo $quotations;

$quotation;
        foreach ($quotations as $key){
            
            $quotation=$key;

        }

//echo $quotation;

        //$departments =department::get();
      
       // return view('admin.persons.create',compact('departments','sex'));,compact('departments')
        return view('admin.quotation.invoice',compact('quotation')  );
    }















    public function create_with_id($id)
    {
       
       echo $id;
        //

        //$departments =department::get();
      
       // return view('admin.persons.create',compact('departments','sex'));,compact('departments')
       //return view('admin.quotation.create');
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
/*
        $request->validate([
            'name' => 'required',
            'phn' => 'required',
             
        ]);
        */
               
$data=$request->all();



$data['user_id']= Auth::id();
$data['lead_id']= Session::get('id');
$data['total_price']=$data['price']*($data['tax']/100)+$data['price'];
echo  Auth::id(). Session::get('id');
      

        Quo::create($data);
       
        return redirect()->route('quotation_index_id',Session::get('id'))
                        ->with('success','quotation created successfully.');
                        
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
    public function edit(Quo $quotation)
    {

        //echo   $quotation;
        //
       // echo $person;
       //$departments =department::get();


       return view('admin.quotation.edit',compact('quotation')  );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDemoRequest  $request
     * @param  \App\Models\Demo  $demo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDemoRequest $request, Quo $quotation)
    {



   $data=  $request->all();



 

   $data['total_price']=$data['price']*($data['tax']/100)+$data['price'];









//echo $data['customer_acceptance'];


 //echo strcasecmp(trim($data['customer_acceptance']) ,"Approved" == 0)."cs";
//echo $data['customer_acceptance'];



  //return $data;
  


  if(isset($data['general_manger_acceptence'])){


    if(
    

        //Auth::user()->user_type=="admin"||
    
        trim($data['general_manger_acceptence'])=="Approved"



       // strcasecmp( $data['customer_acceptance'],"Approved" == 0)


        /*
        ||(
        &&
        strcasecmp( $data['sales_man_acceptance'],"Approved" == 0)
        &&
        strcasecmp( $data['sales_manger_acceptance'],"Approved" == 0)
        &&
        strcasecmp( $data['accountant_accpetnace'],"Approved" == 0)
        &&
        strcasecmp( $data['it_manger_accpetnace'],"Approved" == 0)

        &&
        strcasecmp( $data['general_manger_acceptence'],"Approved" == 0)
        )
       
*/



    ){


        echo "Accepted";

        $data['quotation_state']="sell_order";

        $quotation->update($data);
      
       // return redirect()->route('quotation.index')->with('success','quotation updated successfully');
                        
       return redirect()->route('quotation_index_id',Session::get('id'))
       ->with('success','quotation  updated successfully.');


    }else{

        echo "rejected";

        
        $data['quotation_state']="quotation";

       $quotation->update($data);
      
        //return redirect()->route('quotation.index')->with('success','quotation updated successfully');

                        
        return redirect()->route('quotation_index_id',Session::get('id'))
        ->with('success','quotation  updated successfully.');               
         
                        
    }




  }
  else{




    $quotation->update($data);
      
        //return redirect()->route('quotation.index')->with('success','quotation updated successfully');

                        
        return redirect()->route('quotation_index_id',Session::get('id'))
        ->with('success','quotation  updated successfully.'); 








  }


  



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
