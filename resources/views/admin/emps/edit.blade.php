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
   
    






        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
                <strong></strong>
                <input value="{{ $emp->name}}" type="text" name="name" class="form-control" placeholder="Name"  required>
            </div>
        </div>



        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
                <strong></strong>
                <input value="{{ $emp->email}}" type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
        </div>


        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
                <strong></strong>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
        </div>

      




        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
              
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
                  <br>
            </div>
        </div>




 




    
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection