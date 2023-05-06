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
                    <strong>Name</strong>
                    <input type="text" value="{{ $emp->name}}" name="name" class="form-control" placeholder="Name" required>
                     
    
                </div>
    
    
                <br>
                <div class="form-outline">
                    <strong>Email</strong>
                    <input type="email" value="{{ $emp->email}}" name="email" class="form-control" placeholder="Name" required>
                     
                </div>
    
    
                <br>
                <div class="form-outline">
                    <strong>Password</strong>
                    <input type="password" value="{{ $emp->password}}" name="password" class="form-control" placeholder="Name" required>
                     
                </div>
    
    
    
                <strong>User Type:</strong>
                <select name="user_type"  class="form-control">
    

                    <option  value="{{$emp->user_type}}"> {{$emp->user_type}}</option>
                    <option value="cc">cc</option>
                    <option value="sman">sman</option>
                    <option value="smanger">smanger</option>
                    <option value="acc">acc</option>
                    <option value="mmanger">mmanger</option>
                    <option value="itmanger">itmanger</option>
                    <option value="gmanger">gmanger</option>
            
                  </select>
                <div class="form-outline">
     
                    <strong>Department:</strong>
                    <br>
                    <select name="department"   id="departments_id" class="form-control"  >
    
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