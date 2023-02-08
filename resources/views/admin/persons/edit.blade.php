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
  
    <form action="{{ route('persons.update',$person->id) }}" method="POST">
        @csrf
        @method('PUT')
   
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" value="{{$person->name}}" required>
                </div>
            </div>
    
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    
                    <select name="title"  >
                        <option  value="{{$person->title}}"> {{$person->title}}</option>
                        <option value="Mr."> Mr.</option>
                        <option value="Ms.">Ms.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Eng.">Eng.</option>
                        <option value="Dr.">Dr.</option>
                      </select>
                </div>
            </div>
    
    
    
            
    <br>
    
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone Number:</strong>
                    <input type="number" name="phn" class="form-control"  value="{{$person->phn}}"  required>
                </div>
            </div>
    
    
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone Number 2:</strong>
                    <input type="text" name="phn2" class="form-control" value="{{$person->phn2}}" required >
                </div>
            </div>
    
    
    
    
    
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prefred Contact:</strong>
                  
                    <select name="prefered_contact"  >
                        <option  value="{{$person->prefered_contact}}"> {{$person->prefered_contact}}</option>
                        <option value="1"> 1 </option>
                        <option value="2">2</option>
                      
                      </select>
                </div>
            </div>
    
    
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" class="form-control" value="{{$person->email}}" required>
                </div>
            </div>
    
    
    
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address:</strong>
                    <input type="text" name="address" class="form-control" value="{{$person->address}}"  required>
                </div>
            </div>
    
    
    
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Area:</strong>
                    <input type="text" name="area" class="form-control"  value="{{$person->area}}" required >
                </div>
            </div>
    
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Countery:</strong>
                    <select name="country"  >
                        <option  value="{{$person->country}}"> {{$person->country}}</option>
                        <option value="ksa">ksa</option>
                      
                      
                      </select>
                </div>
            </div>
    
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>City:</strong>
                    <input type="text" name="city" class="form-control" value="{{$person->city}}" required >
                </div>
            </div>
    
    
    
    
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Time to Call:</strong>
                    <input type="time" name="time_to_call" class="form-control" value="{{$person->time_to_call}}" required >
                </div>
            </div>
    
    
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Service:</strong>
                   
                    <select name="service"  >
                        <option value="w sender">w sender</option>
                        <option value="social media ads">social media ads</option>
                        <option value="social media mangment">social media mangment</option>
                        <option value="makeing website">makeing website</option>
                      
                      </select>
                </div>
            </div>
    <br>
    <br>
    
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Source:</strong>
                    <select name="source"  >
                        <option value="Facebook">Facebook</option>
                        <option value="Instgram">Instgram</option>
                        <option value="Snap">Snap</option>
                        <option value="Snap">Email</option>
                      
                      </select>
                </div>
            </div>
    
    
          
    
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Mony:</strong>
                    <input type="number" name="mony" class="form-control" value="{{$person->mony}}" required >
                </div>
            </div>
    
    
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Note:</strong>
                    <textarea class="form-control" style="height:150px" name="note"  required  >
                    
                    
                  {{$person->note}} 
                    </textarea>
                </div>
            </div>
    
    
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection