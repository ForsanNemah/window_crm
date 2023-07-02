 
@extends('sidebar')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> </h2>
            </div>
            <div class="pull-right">

                @if (Auth::user()->user_type==0)

                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('persons.create') }}"> Create New Lead</a>
                </div>
    
                @endif
    



<br>
<br>


                <a class="btn btn-success" href="{{ route('person_make_excel') }}"> Export to Excel</a>


 











            </div>
        </div>
    </div>
    <br>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   


  


<br>

 

<br>

<form action="{{ route('persons_search_with_filter') }}" method="GET">
    @csrf

    <div class="input-group">
        <strong>From:</strong>&nbsp
        <input type="date" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" name="from"   />
        &nbsp<strong>To:</strong>&nbsp
        <input type="date" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" name="to"   />
       
      </div>
<br>
      
        <div class="form-group">
            <strong>Service:</strong>
           
            <select name="service"   >

                <option value=""></option>

                @foreach($services as $service )
                <option value="{{ $service->name }}">{{ $service->name }}</option>
              @endforeach
              
              </select>



 


              <strong>Status:</strong>
              <select name="state"     id="state_id"  >
          
                <option value=""></option>

                 
                @foreach($statuses as $status )
                <option value="{{ $status->name }}">{{ $status->name }}</option>
              @endforeach
          
          
          
          
          
                
                </select>

















 
                <strong>User:</strong>
                <select name="user_id"   id="user_name_id"  >
    
                      
                    <option value=""></option>
                    @foreach($users as $user )
    <option value="{{ $user->id }}">{{ $user->name }}</option>
  @endforeach
  
  
  
  
                  
                  </select>





















        </div>
    

 











      <br>
      <button type="submit" class="btn btn-outline-primary">filter</button>
</form>










<br>
<h>No={{count($persons)}}</h>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
           
            <th>Date</th>
            <th>Time</th>
            <th>Lead Name</th>
            <th>Service</th>
            <th>Status</th>
            <th>User</th>
            <th>w1</th>
            <th>w2</th>
            <th>c1</th>
            <th>c2</th>
        </tr>
        @php
        $i=1; 
     @endphp
        @foreach ($persons as $person)

        @php
        $new_array = explode(' ',$person->created_at) ;
    @endphp
     

@if (1==1)
<tr>
            
    <td>{{ $i }}</td>
    @php
    $i++; 
 @endphp
     <td>{{ $new_array[0]}}</td>
     <td>{{ $new_array[1]}}</td>
     <td>{{ $person->name }}</td>
     <td>{{ $person->service }}</td>
     <td>{{ $person->state }}</td>
     <td>{{ $person->user_name }}</td>


   <td>
  
<a href="

https://api.whatsapp.com/send/?phone={{$person->phn}}&text&type=phone_number&app_absent=0


">
    <i class="bi bi-whatsapp"> </i>
</a>
 
</td>






<td>
  
    <a href="
    
    https://api.whatsapp.com/send/?phone={{$person->phn2}}&text&type=phone_number&app_absent=0
    
    
    ">
        <i class="bi bi-whatsapp"> </i>
    </a>
     
    </td>





  






        <td>
  
            <a href="
            
         tel:{{$person->phn}}
            
            
            ">
            <i class="bi bi-telephone"></i>
            </a>
             
            </td>
        
    


            
        <td>
  
            <a href="
            
         tel:{{$person->phn2}}
            
            
            ">
            <i class="bi bi-telephone"></i>
            </a>
             
            </td>
        





   <td>
       <form action="{{ route('persons.destroy',$person->id) }}" method="POST">

          

    
           

<td>
    <a class="btn btn-primary" href="{{ route('persons.edit',$person->id) }}">Edit</a>

</td>

<td>
    <a class="btn btn-primary" href="{{ route('user_follow_up_logs',$person->id) }}">Follow</a>
</td>

<td>

    <a class="btn btn-primary" href="{{ route('complain_logs',$person->id) }}">complain</a>
</td>
 

           
            

           @csrf
           @method('DELETE')
<!--
           <button type="submit" onclick="return confirm('Sure Want Delete?')"  class="btn btn-danger">Delete</button>
-->
       </form>
   </td>
</tr> 
@endif


  
        @endforeach



    </table>
    
  
      
      
@endsection



