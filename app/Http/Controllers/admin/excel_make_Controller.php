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

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Invoice;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use File;
 


class excel_make_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        //echo "donw";
        /*
        $quotations =Quo::latest()->paginate(5);
        //return $quotations; 
       

        return view('admin.quotation.index',compact('quotations'))
            ->with('i', (request()->input('page', 1) - 1) * 5);



            */
            
    }
    




    public function make_invoice_excel($invoice_id)
    {



echo $invoice_id;






//$invoices =Invoice::where('id', '=',  $invoice_id)->get();
//echo $quotations;




$invoices =DB::select('select invoices.*,persons.service,persons.name,persons.city,persons.phn from invoices,persons where invoices.lead_id=persons.id   and invoices.id=? ',[$invoice_id]);





$invoice;
foreach ($invoices as $key){
    
    $invoice=$key;

}


echo  $invoice->id;
//return $invoice;




        
 echo "wwe";


 echo copy("files/invoices_temp.xlsx", Auth::id().".xlsx");









 $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");

 $spreadsheet = $reader->load(Auth::id().'.xlsx');

 $sheet = $spreadsheet->getActiveSheet();

echo "wwe";



//$sheet->getCell('A1') ->setValue('value good');



$sheet->getCell('G6')->setValue( $invoice->created_at);
 


 $sheet->getCell('E7')
 ->setValue( $invoice->id);



 $sheet->getCell('E8')
 ->setValue( $invoice->invoice_type);


 $sheet->getCell('E9')
 ->setValue( $invoice->tax_id);



 $sheet->getCell('C12')
 ->setValue( $invoice->name);


 $sheet->getCell('H13')
 ->setValue( $invoice->city);


 $sheet->getCell('C13')
 ->setValue( $invoice->phn);


 $sheet->getCell('C17')
 ->setValue( $invoice->service);





 $sheet->getCell('H19')
 ->setValue( $invoice->price);


 $sheet->getCell('H20')
 ->setValue( $invoice->tax);


 
 
 $sheet->getCell('H21')
 ->setValue( $invoice->tax +  $invoice->price);


 $sheet->getCell('H23')
 ->setValue( $invoice->payed_mony);



 $sheet->getCell('H24')
 ->setValue( ($invoice->tax+$invoice->price)-$invoice->payed_mony);



 $sheet->getCell('I27')
 ->setValue($invoice->start_date);


 $sheet->getCell('F27')
 ->setValue($invoice->end_date);

 


 $sheet->getCell('C31')
 ->setValue($invoice->des);


 
 $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
 $writer->save(Auth::id().'.xlsx');


 /*

$path=public_path('q.xlsx');
$filename="q.xlsx";
 return response()->download($path, $filename, [
    'Content-Type' => 'application/vnd.ms-excel',
    'Content-Disposition' => 'inline; filename="' . $filename . '"'
 ]);
 
*/

//Storage::download('q.xlsx');
 
 
 

 
ob_end_clean();

$filePath = public_path(Auth::id().".xlsx");
$headers = ['Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet/pdf'];
$fileName = Auth::id().'.xlsx';

return response()->download($filePath, $fileName, $headers);
ob_end_clean();
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

































    public function make_sells_order_excel($quotation_id)
    {



echo $quotation_id;






//$invoices =Invoice::where('id', '=',  $invoice_id)->get();
//echo $quotations;




$quotations =DB::select('select quotation.*,persons.service,persons.name,persons.city,persons.phn from quotation,persons where quotation.lead_id=persons.id   and quotation.id=? ',[$quotation_id]);





$quotation;
foreach ($quotations as $key){
    
    $quotation=$key;

}


echo  $quotation->id;
//return $quotation;


 




echo "wwe";


echo copy("files/sales_order_temp.xlsx", Auth::id().".xlsx");









$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");

$spreadsheet = $reader->load(Auth::id().'.xlsx');

$sheet = $spreadsheet->getActiveSheet();

echo "wwe";



//$sheet->getCell('A1') ->setValue('value good');



$sheet->getCell('I6')->setValue( $quotation->created_at);



$sheet->getCell('E8')
->setValue( $quotation->id);



$sheet->getCell('E9')
->setValue( $quotation->invoice_type);

 



$sheet->getCell('C13')
->setValue( $quotation->name);


$sheet->getCell('H14')
->setValue( $quotation->city);


$sheet->getCell('C14')
->setValue( $quotation->phn);


$sheet->getCell('C18')
->setValue( $quotation->service);





$sheet->getCell('H20')
->setValue( $quotation->price);


$sheet->getCell('H21')
->setValue( $quotation->tax);




$sheet->getCell('H22')
->setValue( $quotation->tax +  $quotation->price);


$sheet->getCell('H24')
->setValue( $quotation->payed_mony);



$sheet->getCell('H25')
->setValue( ($quotation->tax+$quotation->price)-$quotation->payed_mony);



$sheet->getCell('I28')
->setValue($quotation->start_date);


$sheet->getCell('D28')
->setValue($quotation->end_date);




$sheet->getCell('C32')
->setValue($quotation->des);









$sheet->getCell('j37')
->setValue($quotation->customer_acceptance);



$sheet->getCell('j38')
->setValue($quotation->sales_man_acceptance);





$sheet->getCell('j39')
->setValue($quotation->accountant_accpetnace);



$sheet->getCell('j40')
->setValue($quotation->it_manger_accpetnace);



$sheet->getCell('j41')
->setValue($quotation->it_manger_accpetnace);


$sheet->getCell('j42')
->setValue($quotation->sales_order_status);


$sheet->getCell('j43')
->setValue($quotation->general_manger_acceptence);










$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
$writer->save(Auth::id().'.xlsx');


/*

$path=public_path('q.xlsx');
$filename="q.xlsx";
return response()->download($path, $filename, [
   'Content-Type' => 'application/vnd.ms-excel',
   'Content-Disposition' => 'inline; filename="' . $filename . '"'
]);

*/

//Storage::download('q.xlsx');





ob_end_clean();

$filePath = public_path(Auth::id().".xlsx");
$headers = ['Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet/pdf'];
$fileName = Auth::id().'.xlsx';

return response()->download($filePath, $fileName, $headers);
ob_end_clean();
    }







  



    public function make_quotation_excel($quotation_id)
    {



echo $quotation_id;






//$invoices =Invoice::where('id', '=',  $invoice_id)->get();
//echo $quotations;




$quotations =DB::select('select quotation.*,persons.service,persons.name,persons.city,persons.phn from quotation,persons where quotation.lead_id=persons.id   and quotation.id=? ',[$quotation_id]);





$quotation;
foreach ($quotations as $key){
    
    $quotation=$key;

}


echo  $quotation->id;
//return $quotation;




        
 echo "wwe";


 echo copy("files/quotation_temp.xlsx", Auth::id().".xlsx");









 $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");

 $spreadsheet = $reader->load(Auth::id().'.xlsx');

 $sheet = $spreadsheet->getActiveSheet();

echo "wwe";



//$sheet->getCell('A1') ->setValue('value good');



$sheet->getCell('i3')->setValue( $quotation->created_at);
 


 $sheet->getCell('G3')
 ->setValue( $quotation->id);



 


 $sheet->getCell('E9')
 ->setValue( $quotation->tax_id);



 $sheet->getCell('C6')
 ->setValue( $quotation->name);


 $sheet->getCell('H7')
 ->setValue( $quotation->city);


 $sheet->getCell('E7')
 ->setValue( $quotation->phn);


 $sheet->getCell('H8')
 ->setValue( $quotation->no_of_expire_days);



 $sheet->getCell('C17')
 ->setValue( $quotation->service);





 $sheet->getCell('H19')
 ->setValue( $quotation->pay_way);


 $sheet->getCell('H20')
 ->setValue( $quotation->price);


 
 
 $sheet->getCell('H21')
 ->setValue( $quotation->tax);


 $sheet->getCell('H22')
 ->setValue( $quotation->price+$quotation->tax);



 



 $sheet->getCell('H25')
 ->setValue($quotation->start_date);


 $sheet->getCell('E25')
 ->setValue($quotation->end_date);

 


 $sheet->getCell('C29')
 ->setValue($quotation->des);


 
 $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
 $writer->save(Auth::id().'.xlsx');


 /*

$path=public_path('q.xlsx');
$filename="q.xlsx";
 return response()->download($path, $filename, [
    'Content-Type' => 'application/vnd.ms-excel',
    'Content-Disposition' => 'inline; filename="' . $filename . '"'
 ]);
 
*/

//Storage::download('q.xlsx');
 
 
 

 
ob_end_clean();

$filePath = public_path(Auth::id().".xlsx");
$headers = ['Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet/pdf'];
$fileName = Auth::id().'.xlsx';

return response()->download($filePath, $fileName, $headers);
ob_end_clean();
    }

























































    //make_sells_order_excel






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
