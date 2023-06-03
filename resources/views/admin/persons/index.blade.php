 
@extends('sidebar')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> </h2>
            </div>

            @php
       
       //$create_lead_users = array("admin", "cc", "sman", "smanger","acc","mmanger","itmanger");
       $create_lead_users = array("admin", "cc", "sman", "smanger","mmanger","itmanger","gmanger");
 


            @endphp


            @if (in_array(Auth::user()->user_type, $create_lead_users))

            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('persons.create') }}"> Create New Lead</a>
            </div>

            @endif


        


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
        <input type="number" class="form-control rounded" placeholder="Search by Phone Number" aria-label="Search" aria-describedby="search-addon" name="search_key" />
        &nbsp      &nbsp
        <button type="submit" class="btn btn-outline-primary">search</button>
       
      </div>

</form>

<br>

<h>No={{$persons->total()}}</h>




 

    <table class="table table-bordered">
        <tr>
            <th>No</th>
           
            <th>Date</th>
            <th>Time</th>
            <th>Lead Name</th>
            <th>Service</th>
            <th>Status</th>
            <th>User</th>
            
        </tr>
        @foreach ($persons as $person)
        @php
         $new_array = explode(' ',$person->created_at) ;
     @endphp
      
 
        <tr>
            <td>{{ ++$i }}</td>
            
           
             
            <td>{{ $new_array[0]}}</td>
            <td>{{ $new_array[1]}}</td>
            <td>{{ $person->name }}</td>
            <td>{{ $person->service }}</td>
            <td>{{ $person->state }}</td>
            <td>{{ $person->user_name }}</td>
          
            <td>
                <form action="{{ route('persons.destroy',$person->id) }}" method="POST">
   
                   
    
                 
                    <div class="form-group">

                        <br>
                       
                        <a class="btn btn-primary" href="{{ route('persons.edit',$person->id) }}">Edit</a>
                        <br>
                        <br>
                        <a class="btn btn-primary" href="{{ route('user_follow_up_logs',$person->id) }}">Follow up</a>


                        <br>
                        <br>
                        <a class="btn btn-primary" href="{{ route('complain_logs',$person->id) }}">complain</a>
                        <a class="btn btn-primary" href="{{ route('quotation_index_id',$person->id) }}">Quotation</a>

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




