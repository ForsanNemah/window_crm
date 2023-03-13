 
@extends('sidebar')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('emps.create') }}"> Create New 
                    employee</a>
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
            <th>department</th>
       
        </tr>
        @foreach ($emps as $emp)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $emp->name }}</td>
            <td>{{ $emp->department }}</td>
       
            <td>
                <form action="{{ route('emps.destroy',$emp->id) }}" method="POST">
   
                   
    
                    <a class="btn btn-primary" href="{{ route('emps.edit',$emp->id) }}">Edit</a>
               
 
                    @csrf
                    @method('DELETE')
                    
      
                    <button type="submit" onclick="return confirm('Sure Want Delete?')"  class="btn btn-danger">Delete</button>
                    
                    <br>
 
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
  
    
    {!! $emps->links() !!}
      
@endsection