 
@extends('sidebar')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('follow_up.create') }}">   New 
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
       
            <th>Note</th>
            <th>State</th>
            <th>Visit Date</th>
            <th>Appointment Date</th>
            <th>User Name</th>
            <th>Date</th>


       
        </tr>
        @foreach ($follow_ups as $follow_up)
        @php
        $new_array = explode(' ',$follow_up->created_at) ;
    @endphp
        <tr>
            
            <td>{{ $follow_up->note }}</td>
            <td>{{ $follow_up->state }}</td>
            <td>{{ $follow_up->visit_date }}</td>
            <td>{{ $follow_up->appointment_date}}</td>
            <td>{{ $follow_up->name}}</td>
            <td>{{ $new_array[0]}}</td>
            <td>{{ $new_array[1]}}</td>
            <!--
            <td>
                <form action="{{ route('follow_up.destroy',$follow_up->id) }}" method="POST">
   
                   
    
                    <a class="btn btn-primary" href="{{ route('follow_up.edit',$follow_up->id) }}">Edit</a>
               
 
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