@extends('sidebar')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit person</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('persons.index') }}"> Back</a>
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
  
    <br>
    <form action="{{ route('persons.update',$person->id) }}" method="POST">
        @csrf
        @method('PUT')
   
        <div class="row">

            
    
           


    <br>
    <br>
    
    
    <div class="row">
    
        <div class="col">
            <label for="IDofInput">Title:</label> 
            <select name="title"  >
                <option value="{{$person->title}}">{{$person->title}}</option>
                <option value="Mr.">Mr. </option>
                <option value="Ms.">Ms.</option>
                <option value="Mr.">Mr.</option>
                <option value="Eng.">Eng.</option>
                <option value="Dr.">Dr.</option>
              </select>
    
    <br>
    <br>
    
    
            <strong>Name:</strong>
              <input type="text" name="name" class="form-control" value="{{$person->name}}"   required>
    
              <strong>Phone Number:</strong>
              <input type="number" name="phn" class="form-control" value="{{$person->phn}}" required >
    
              <strong>Phone Number 2:</strong>
              <input type="number" name="phn2" class="form-control"  value="{{$person->phn2}}"  >
    
    <br>
    
              <strong>Prefred Contact:</strong>
                  
              <select name="prefered_contact"  >
                <option value="{{$person->prefered_contact}}">{{$person->prefered_contact}}</option>
                  <option value="1"> 1 </option>
                  <option value="2">2</option>
                
                </select>
    <br>
    <br>
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control"  value="{{$person->email}}" >
                <br>
                <strong>Address:</strong>
                <input type="text" name="address" class="form-control" value="{{$person->address}}"  >
    
        </div>
        
    
    
    
    
    
    
    
    
    
    
        
        <div class="col">
            <br>
            <br>
            <strong>Area:</strong>
            <input type="text" name="area" class="form-control" value="{{$person->area}}"  >
    
            
            <strong>Countery:</strong>
            <br>
            <select name="country"  >
                <option value="ksa">ksa</option>
              
              
              </select>
    <br>
    <br>
    
    
              <strong>City:</strong>
              <input type="text" name="city" class="form-control" value="{{$person->city}}"  >
    
              <strong>Time to Call:</strong>
              <input type="time" name="time_to_call" class="form-control" value="{{$person->time_to_call}}" >
    
    
    
    <br>
              <strong>Service:</strong>
                   
              <select name="service"  >
                <option value="{{$person->service}}">{{$person->service}}</option>
                  <option value="w sender">window sender</option>
                  <option value="social media ads">social media ads</option>
                  <option value="social media mangment">social media manegment</option>
                  <option value="makeing website">makeing website</option>
                  <option value="makeing website">makeing mobile apps </option>
                
                </select>
    
    
    
    <br>
    <br>
                <strong>Source:</strong>
                <select name="source"  >
                    <option value="{{$person->source}}">{{$person->source}}</option>
                    <option value="Facebook">Facebook</option>
                    <option value="Instgram">Instgram</option>
                    <option value="Youtube">Youtube</option>
                    <option value="Linkedin">Linkedin</option>
                    <option value="SMS">SMS</option>
                    <option value="Snap">Snap</option>
                    <option value="Snap">Email</option>
                    <option value="call">call</option>
                    <option value="Other">Other</option>
                  
                  </select>
    
                  <br>
                  <strong>Note:</strong>
                  <textarea class="form-control" style="height:150px" name="note" >
                
                    {{$person->note}}
                </textarea>
    
    
    <br>
    
                  <strong>Department:</strong>
                  <br>
                  <select name="department"   id="departments_id"  >
    
                    <option value="{{$person->department}}">{{$person->department}}</option>
    
                      @foreach($departments as $department )
      <option value="{{ $department->name }}">{{ $department->name }}</option>
    @endforeach
    
    
    
    
                    
                    </select>
    <br>
    <br>
    
                    <button type="submit" class="btn btn-primary">Submit</button>
    
          
        </div>
    </div>





   
    </form>
@endsection