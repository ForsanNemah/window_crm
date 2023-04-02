@extends('sidebar')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Complain</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('complaint_report') }}"> Back</a>
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
  
    <form action="{{ route('complain2.update',$Complain2->id) }}" method="POST">
        @csrf
        @method('PUT')
   
    


<br>
<br>




        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Complaint Statuss:</strong>
                
                <select name="state"  >
                    <option  value="{{$Complain2->title}}"> {{$Complain2->state}}</option>

                    <option value="{{config('app.closed')}}">{{config('app.closed')}}</option>
                    <option value="{{config('app.opened')}}">{{config('app.opened')}}</option>
                    <option value="{{config('app.postponed')}}">{{config('app.postponed')}}</option>

                  </select>
            </div>
        </div>




        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
              
                <strong>Department:</strong>
                <select name="department"   id="departments_id"  >

                    <!--
                    <option value="C Center">C Center</option>
                    <option value="sales">slaes</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Manegment">Manegment</option>
                    -->

                    @foreach($departments as $department )
    <option value="{{ $department->name }}">{{ $department->name }}</option>
  @endforeach


 
  
                  
                  </select>
                  <br>
            </div>
        </div>













      



        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
           
                <strong>Note:</strong>
                <input type="text" name="note" class="form-control" value="{{$Complain2->note}}" required>
            </div>
        </div>




        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
           
                <strong>Time to Call:</strong>
                <input type="time" name="time_to_call" class="form-control" value="{{$Complain2->time_to_call}}" required>
            </div>
        </div>



        

  



 

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
              
                <strong>Referred to :</strong>
                <select name="referred_to"   id="departments_id"  >

                    <!--
                    <option value="C Center">C Center</option>
                    <option value="sales">slaes</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Manegment">Manegment</option>
                    -->

                    <option  value="{{$Complain2->referred_to}}"> {{$Complain2->referred_to}}</option>

                    @foreach($users as $user )
    <option value="{{ $user->name }}">{{ $user->name }}</option>
  @endforeach


 
  
                  
                  </select>
                  <br>
            </div>
        </div>


























    
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <br>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection