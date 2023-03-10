 
@extends('sidebar')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('persons.create') }}"> Create New Lead</a>
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
             
                <option value="w sender">window sender</option>
                <option value="social media ads">social media ads</option>
                <option value="social media mangment">social media manegment</option>
                <option value="makeing website">makeing website</option>
                <option value="makeing website">makeing mobile apps </option>
              
              </select>






              <strong>State:</strong>
              <select name="state"     id="state_id"  >
          
                <option value=""></option>
                  <option value="{{config('app.vi')}}">{{config('app.vi')}}</option>
                  <option value="{{config('app.vis')}}">{{config('app.vis')}}</option>
                  <option value="{{config('app.ap')}}">{{config('app.ap')}}</option>
                  <option value="{{config('app.hena')}}">{{config('app.hena')}}</option>
                  <option value="{{config('app.nr')}}">{{config('app.nr')}}</option>
                  <option value="{{config('app.wfa')}}">{{config('app.wfa')}}</option>
                  <option value="{{config('app.fu')}}">{{config('app.fu')}}</option>
                  <option value="{{config('app.lost')}}">{{config('app.lost')}}</option>
                  <option value="{{config('app.sold')}}">{{config('app.sold')}}</option>
                  <option value="{{config('app.res')}}">{{config('app.res')}}</option>
                  
          
          
          
          
          
                
                </select>










        </div>
    

 











      <br>
      <button type="submit" class="btn btn-outline-primary">filter</button>
</form>










<br>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>State</th>
            <th>Department</th>
            <th>Phone Number</th>
            <th>Phone Number 2</th>
            <th>Prefered Number</th>
            <th>Email</th>
          
            <th>Country</th>
            <th>Service</th>
            <th>Source</th>
            <th>Time to Call</th>
    
            <th>Note</th>
            <th>Date</th>
            <th>Time</th>
            <th width="280px"> </th>
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
   <td>{{ $person->name }}</td>
   <td>{{ $person->state }}</td>
   <td>{{ $person->department }}</td>
   <td>{{ $person->phn }}</td>
   <td>{{ $person->phn2 }}</td>
   <td>{{ $person->prefered_contact}}</td>
   <td>{{ $person->email }}</td>

   <td>{{ $person->country }}</td>
   <td>{{ $person->service }}</td>
   <td>{{ $person->source }}</td>
   <td>{{ $person->time_to_call }}</td>



   <td>{{ $person->note }}</td>
   <td>{{ $new_array[0]}}</td>
   <td>{{ $new_array[1]}}</td>



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
        
        https://api.whatsapp.com/send/?phone={{$person->phn2}}&text&type=phone_number&app_absent=0
        
        
        ">
         
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

          

           <a class="btn btn-primary" href="{{ route('persons.edit',$person->id) }}">Edit</a>
           



           <div class="form-group">
               <br>
               <a class="btn btn-primary" href="{{ route('user_follow_up_logs',$person->id) }}">Follow up</a>
           </div>

           
            

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