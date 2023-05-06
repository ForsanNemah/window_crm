<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\person;
use App\Models\Quo;
use App\Models\Invoice;
use App\Models\department;
use App\Http\Requests\StoreDemoRequest;
use App\Http\Requests\UpdateDemoRequest;
use DB;
use Auth;
use Session;
use \Illuminate\Pagination\Paginator;
use App\Collection;
class invoiceController extends Controller
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
    




    public function index_id($id)
    {

        Session::put('id', $id);

        $quotations_collection =DB::select('select quotation.*,persons.service,persons.name from quotation,persons where quotation.lead_id=persons.id ');
        $quotations=  collect( $quotations_collection )->paginate( 5 );


        return view('admin.quotation.index',compact('quotations'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

 
            
    }
   


    public function  show_invoices($invoice_quotation_id)
    {

        Session::put('invoice_quotation_id', $invoice_quotation_id);

        echo Session::get('invoice_quotation_id');

        $invoices_collection =DB::select('select invoices.*,persons.service,persons.name from invoices,persons where invoices.lead_id=persons.id   and invoices.quotation_id=? ',[Session::get('invoice_quotation_id')]);
        $invoices=  collect( $invoices_collection )->paginate( 5 );
        return view('admin.quotation.index_invoices',compact('invoices'))
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

        Session::put('quotation_id', $quotation_id);


        $quotations =Quo::where('id', '=',  $quotation_id)->get();
        //echo $quotations;

$quotation;
        foreach ($quotations as $key){
            
            $quotation=$key;

        }


        

if($quotation['quotation_state']=="sell_order"){


    return view('admin.quotation.invoice',compact('quotation'));

}
else{

    //echo "not sell order yet";
    abort(403);

}





       // return $quotation;
//echo $quotation;

        //$departments =department::get();
      
       // return view('admin.persons.create',compact('departments','sex'));,compact('departments')
      
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

        $data=$request->all();
        //
/*
        $request->validate([
            'name' => 'required',
            'phn' => 'required',
             
        ]);
        */
      
//$data['user_id']= Auth::id();
//$data['lead_id']= Session::get('id');
//return $data;


$data['user_id']= Auth::id();
$data['lead_id']= Session::get('id');
$data['quotation_id']= Session::get('quotation_id');



//echo  Auth::id(). Session::get('id');
      

Invoice::create($data);
       
        return redirect()->route('quotation_index_id',Session::get('id'))
                        ->with('success','invoice created successfully.');

                       


                    
                    
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



      //return  $request->all();







        //


//return $request->all();


       
       echo  $quotation->update($request->all());
      
        return redirect()->route('quotation.index')
                        ->with('success','quotation updated successfully');
                        
                 
                        
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
