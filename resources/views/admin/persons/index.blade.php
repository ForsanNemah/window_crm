 
@extends('sidebar')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('persons.create') }}"> Create New Person</a>
            </div>
        </div>
    </div>
    <br>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Note</th>
            <th width="280px"> </th>
        </tr>
        @foreach ($persons as $person)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $person->name }}</td>
            <td>{{ $person->phn }}</td>
            <td>{{ $person->note }}</td>
            <td>
                <form action="{{ route('persons.destroy',$person->id) }}" method="POST">
   
                   
    
                    <a class="btn btn-primary" href="{{ route('persons.edit',$person->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" onclick="return confirm('Sure Want Delete?')"  class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
  
    
    {!! $persons->links() !!}
      
@endsection