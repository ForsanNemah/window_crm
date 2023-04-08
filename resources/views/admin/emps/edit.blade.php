@extends('sidebar')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit emp</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('emps.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('emps.update',$emp->id) }}" method="POST">
        @csrf
        @method('PUT')
   
    




        <div class="row my-3">

            <div class="col-md-6">
                <div class="form-outline">
                    <strong></strong>
                    <input type="text" value="{{ $emp->name}}" name="name" class="form-control" placeholder="Name" required>
                     
    
                </div>
    
    
                <br>
                <div class="form-outline">
                    <strong></strong>
                    <input type="email" value="{{ $emp->email}}" name="email" class="form-control" placeholder="Name" required>
                     
                </div>
    
    
                <br>
                <div class="form-outline">
                    <strong></strong>
                    <input type="password" value="{{ $emp->password}}" name="password" class="form-control" placeholder="Name" required>
                     
                </div>
    
    
    
                <br>
                <div class="form-outline">
     
                    <strong>Department:</strong>
                    <br>
                    <select name="department"   id="departments_id"  >
    
                        <!--
                        <option value="C Center">C Center</option>
                        <option value="sales">slaes</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Manegment">Manegment</option>
                        -->
                        <option  value="{{$emp->department}}"> {{$emp->department}}</option>
                        @foreach($departments as $department )
        <option value="{{ $department->name }}">{{ $department->name }}</option>
      @endforeach
    
    
     
      
                      
                      </select>
                     
                </div>
    
    
            </div>
    
            
    
        </div>
    
    
    
    
    
    
        <button type="submit" class="btn btn-primary">Submit</button>


























 
   
    </form>
@endsection