<?php

namespace App\Http\Controllers\admin;
set_time_limit(0);
use App\Http\Controllers\Controller;

use App\Models\person;
use App\Models\User;
use App\Models\department;
use App\Models\business_type;
use App\Models\service;
use App\Models\source;
use App\Models\status;
use App\Http\Requests\StoreDemoRequest;
use App\Http\Requests\UpdateDemoRequest;
use DB;
use Auth;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\HelloMail;

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
            ->with('i', (request()->input('page', 1) - 1) * 10);
            
    }
    



    public function make_excel()
    {
        //echo "wwe".$request->get(Items);
        //return  $request["Items"];
        //Request $request


echo "wwe";





 
$spreadsheet = new Spreadsheet();

//add some data in excel cells
$spreadsheet->setActiveSheetIndex(0)
 ->setCellValue('A1', 'ID')
 ->setCellValue('B1', 'NAME')
 ->setCellValue('C1', 'SERVICE')
 ->setCellValue('D1', 'PHONE');



 







 



$i=2;
 foreach(Session::get('persons_value') as $r){

    echo $r->id;
    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A'.$i, $r->id)
    ->setCellValue('B'.$i, $r->name)
    ->setCellValue('C'.$i, $r->service)
    ->setCellValue('D'.$i, $r->phn);
   
    $i++;
    }


 









//set style for A1,B1,C1 cells
$cell_st =[
 'font' =>['bold' => true],
 'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
 'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
];
$spreadsheet->getActiveSheet()->getStyle('A1:C1')->applyFromArray($cell_st);

//set columns width
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(16);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(18);

$spreadsheet->getActiveSheet()->setTitle('Simple'); //set a title for Worksheet

//make object of the Xlsx class to save the excel file
$writer = new Xlsx($spreadsheet);
$fxls ='excel-file_1.xlsx';
$writer->save($fxls);

echo "done";






ob_end_clean();

$filePath =  "excel-file_1.xlsx";
$headers = ['Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet/pdf'];
$fileName = 'excel-file_1.xlsx';

return response()->download($filePath, $fileName, $headers);
ob_end_clean();















        /*
        $persons =person::get();
        header( "Content-type: application/vnd.ms-excel; charset=UTF-8" );
        echo pack("CCC",0xef,0xbb,0xbf);
        echo ' Name' . "\t" . 'service' . "\t" . 'Phone' . "\n";

        foreach($persons as $r){

         

//echo $r->name;
echo $r->name . "\t" . $r->service. "\t" .  $r->phn . "\n";





        }
        header("Content-disposition: attachment; filename=full_leads_report.xls");
      // return $persons; 
      
*/
            
    }












    public function index_reports()
    {
   



        $services =DB::select('SELECT  * from services');
        $statuses =DB::select('SELECT  * from statuses');








if(Auth::user()->user_type=='admin'){

    $persons =DB::select('
        
        
        
    SELECT persons.*,users.name as user_name from persons,users  where   users.id=persons.user_id order by id desc LIMIT 100

    
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


      
      return view('admin.reports.index',compact('persons','users','services','statuses'))
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
        ])->paginate(100);
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
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







































    public function persons_search_by_name(StoreDemoRequest $request)
    {

        $persons =person::where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->search_key)) {
                    $query->orWhere('name', 'LIKE', '%' . $s . '%')
                       
                        ->get();
                }
            }]
        ])->paginate(100);
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
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


        $services =DB::select('SELECT  * from services');
        $statuses =DB::select('SELECT  * from statuses');





        $myq="select persons.*,users.name as user_name from persons,users where 1 ";

//echo $request->from;
//echo $request->to;
//echo $request->service;
//echo $request->state;


if($request->filled('service')){


    $myq=$myq." and  persons.service='".$request->service."'";
 



}

/*
if($request->filled('state')){


    $myq=$myq." where persons.state=".$request->service;
 




}
*/





if($request->filled('from') and $request->filled('to')   ){


    $myq=$myq." and persons.created_at between '".$request->from."' and '".$request->to."'   ";  
 



}






if($request->filled('state')){


    $myq=$myq." and persons.state = '".$request->state."'";  
 



}


if($request->filled('user_id')){


    $myq=$myq." and users.id = '".$request->user_id."'";  
 



}















echo  $myq;

if(Auth::user()->user_type=='1'){

    $myq=$myq." and  persons.department='". Auth::user()->department."'";
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
 
Session::put('persons_value', $persons);

/*
foreach(Session::get('persons') as $r){

echo $r->id;

}
*/
//return Session::get('persons');

return view('admin.reports.index',compact('persons','users','services','statuses'))
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
        
        $business_types =business_type::get();

        $services =service::get();

        $sources =source::get();
       
       return view('admin.persons.create',compact('departments','business_types','services','sources'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDemoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDemoRequest $request)
    {


       

      








        





        
        $request->validate([
            'name' => 'required',
            'phn' => 'required',
             
        ]);



        $data=$request->all();



        $data['user_id']= Auth::id();
        
 
        person::create($data);


        PersonController::get_department_emails($request);
       
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

        echo "".$person->id;

        $business_types =DB::select('SELECT  name from business_types where id=?',[$person->business_type]);
      

       // $old_business_type =$business_type['name'];
          $old_business_type;
 

foreach ($business_types as $business_type) {
     
    $old_business_type=$business_type->name;
 
}




if(!isset($old_business_type)){
    $old_business_type="";

}




        //
       // echo $person;

       
       $departments =department::get();
      
       $business_types =business_type::get();

       $services =service::get();

       $sources =source::get();


       return view('admin.persons.edit',compact('person','departments','services','sources','business_types','old_business_type'));

       
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








    public function get_department_emails(Request $request)

    {


        echo $request['name'];
        $body="new customer added "." service:".$request['service']." note: ".$request['note'];

        $emails =DB::select('SELECT  * from users');

echo "wwe";




$mailData = [
    'title' => 'New Customer',
    'body' =>  $body
];








foreach($emails as $r){

   // echo $r->email."<br>";

   Mail::to($r->email)->send(new HelloMail($mailData));

}


















return;
       // return $emails['id'];

    }

}
