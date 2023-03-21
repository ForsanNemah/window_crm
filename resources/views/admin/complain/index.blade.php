 
@extends('sidebar')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> </h2>
            </div>


            <table class="table table-bordered">
                <thead>
                  <tr>
                    
                    <th scope="col">Name</th>
                    <th scope="col">Phone 1</th>
                    <th scope="col">Phone 2</th>
                    <th scope="col">Prefered Contact</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
              
                    <th scope="col">Area</th>
                    <th scope="col">City</th>
                    <th scope="col">Country</th>
                  </tr>
                </thead>
                <tbody>
              
              
                  @foreach ($person as $item)
                  <tr>
                  
                      <td> {{$item->name}}</td>
                      <td> {{$item->phn}}</td>
                      <td> {{$item->phn2}}</td>
                      <td> {{$item->prefered_contact}}</td>
                      <td> {{$item->email}}</td>
                      <td> {{$item->address}}</td>
                      <td> {{$item->area}}</td>
                      <td> {{$item->city}}</td>
                      <td> {{$item->country}}</td>
                     
                  
                    </tr>
              @endforeach
              
                
                
                </tbody>
              </table>

<br>
<br>





<table class="table table-bordered">
    <thead>
      <tr>
        
        <th scope="col">Service</th>
        <th scope="col">Source</th>
        <th scope="col">Time to Call</th>
        <th scope="col">Note</th>
        <th scope="col">Refferred to</th>
       
   
      </tr>
    </thead>
    <tbody>
  
  
      @foreach ($person as $item)
      <tr>
      
          <td> {{$item->service}}</td>
          <td> {{$item->source}}</td>
          <td> {{$item->time_to_call}}</td>
          <td> {{$item->note}}</td>
          <td> {{$item->department}}</td>
         
         
      
        </tr>
  @endforeach
  
    
    
    </tbody>
  </table>















            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('complain.create') }}">   New 
                    </a>
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
<!--
<form action="{{ route('persons_search') }}" method="GET">
    @csrf

    <div class="input-group">
        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" name="search_key" />
        <button type="submit" class="btn btn-outline-primary">search</button>
      </div>

</form>
-->
<br>

    <table class="table table-bordered">
       
            <th>Department</th>
            <th>State</th>
            <th>Note</th>
           


            <th>Reffred to </th>
            <th>Time to call </th>
            <th>Date</th>
            <th>Time</th>


       
        </tr>
        @foreach ($complaints_logs as $complaints_log)
        @php
        $new_array = explode(' ',$complaints_log->created_at) ;
    @endphp
        <tr>
            
            <td>{{ $complaints_log->department }}</td>
       
            <td>{{ $complaints_log->state }}</td>
            <td>{{ $complaints_log->note }}</td>
            
            <td>{{ $complaints_log->referred_to }}</td>


            <td>{{ $complaints_log->time_to_call	 }}</td>


            <td>{{ $new_array[0]}}</td>
            <td>{{ $new_array[1]}}</td>
            <!--
            <td>
                <form action="{{ route('complain.destroy',$complaints_log->id) }}" method="POST">
   
                   
    
                    <a class="btn btn-primary" href="{{ route('complain.edit',$complaints_log->id) }}">Edit</a>
               
 
                    @csrf
                    @method('DELETE')
                    
      
                    <button type="submit" onclick="return confirm('Sure Want Delete?')"  class="btn btn-danger">Delete</button>
                    
                    <br>
 
                </form>
            </td>
        -->
        </tr>
        @endforeach
    </table>
    
  
    
 
      
@endsection