@extends('sidebar')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Complain</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('complain_logs',Session::get('id')) }}"> Back</a>
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
  
    <form action="{{ route('complain.update',$Complain->id) }}" method="POST">
        @csrf
        @method('PUT')
   
    


<br>
<br>

<div class="row">



    <div class="col-md-6">


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Complaint Status:</strong>
                <br>
                <select name="state"  >
                    <option  value="{{$Complain->title}}"> {{$Complain->state}}</option>

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
                <br>
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
                <input type="text" name="note" class="form-control" value="{{$Complain->note}}" required>
            </div>
        </div>




        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
           
                <strong>Time to Call:</strong>
                <input type="time" name="time_to_call" class="form-control" value="{{$Complain->time_to_call}}" required>
            </div>
        </div>



        

  



 

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
              
                <strong>Referred to :</strong>
                <br>
                <select name="referred_to"   id="departments_id"  >

                    <!--
                    <option value="C Center">C Center</option>
                    <option value="sales">slaes</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Manegment">Manegment</option>
                    -->

                    <option  value="{{$Complain->referred_to}}"> {{$Complain->referred_to}}</option>

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
</div>
   
    </form>
@endsection