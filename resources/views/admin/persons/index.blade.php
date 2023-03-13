 
@extends('sidebar')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('persons.create') }}"> Create New Lead</a>
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

<form action="{{ route('persons_search') }}" method="GET">
    @csrf

    <div class="input-group">
        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" name="search_key" />
        <button type="submit" class="btn btn-outline-primary">search</button>
       
      </div>

</form>

<br>






 

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Title</th>
            <th>Phone Number</th>
            <th>Phone Number 2</th>
            <th>Prefered Number</th>
            <th>Email</th>
            <th>Address</th>
            <th>Area</th>
            <th>City</th>
            <th>Country</th>
            <th>Service</th>
            <th>Source</th>
            <th>Time to Call</th>
          
            <th>Note</th>
            <th>Date</th>
            <th>Time</th>
            <th width="280px"> </th>
        </tr>
        @foreach ($persons as $person)
        @php
         $new_array = explode(' ',$person->created_at) ;
     @endphp
      
 
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $person->name }}</td>
            <td>{{ $person->title }}</td>
            <td>{{ $person->phn }}</td>
            <td>{{ $person->phn2 }}</td>
            <td>{{ $person->prefered_contact}}</td>
            <td>{{ $person->email }}</td>
            <td>{{ $person->address }}</td>
            <td>{{ $person->area }}</td>
            <td>{{ $person->city }}</td>
            <td>{{ $person->country }}</td>
            <td>{{ $person->service }}</td>
            <td>{{ $person->source }}</td>
            <td>{{ $person->time_to_call }}</td>
            
            <td>{{ $person->note }}</td>

            <td>{{ $new_array[0]}}</td>
            <td>{{ $new_array[1]}}</td>
            
          
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
        @endforeach
    </table>
    
  
    
    {!! $persons->links() !!}
      
@endsection