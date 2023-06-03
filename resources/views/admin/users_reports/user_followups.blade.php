 
@extends('sidebar')
 
@section('content')
     
<h>No={{count($follow_ups)}}</h>
    <table class="table table-bordered">
       
            <th>Note</th>
            <th>Status</th>
            <th> Date</th>
           
            <th>Date</th>
            <th>Time</th>

       
        </tr>
        @foreach ($follow_ups as $follow_up)
        @php
        $new_array = explode(' ',$follow_up->created_at) ;
    @endphp
        <tr>
            
            <td>{{ $follow_up->note }}</td>
            <td>{{ $follow_up->state }}</td>
           
            <td>{{ $follow_up->appointment_date}}</td>
           
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