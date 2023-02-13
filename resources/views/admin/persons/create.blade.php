
 
@extends('sidebar')

 
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Person</h2>
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
   
<form action="{{ route('persons.store') }}" method="POST">
    @csrf
  
     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
        </div>

      








<br>
<br>
<br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
              
                <select name="title"  >
                    <option value="Mr.">Mr. </option>
                    <option value="Ms.">Ms.</option>
                    <option value="Mr.">Mr.</option>
                    <option value="Eng.">Eng.</option>
                    <option value="Dr.">Dr.</option>
                  </select>
            </div>
        </div>





<br>
        
<br>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone Number:</strong>
                <input type="number" name="phn" class="form-control" required >
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone Number 2:</strong>
                <input type="text" name="phn2" class="form-control"  required>
            </div>
        </div>


        <br>
        <br>
        <br>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prefred Contact:</strong>
              
                <select name="prefered_contact"  >
                    <option value="1"> 1 </option>
                    <option value="2">2</option>
                  
                  </select>
            </div>
        </div>
  
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" required>
            </div>
        </div>



        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                <input type="text" name="address" class="form-control"  required>
            </div>
        </div>



        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Area:</strong>
                <input type="text" name="area" class="form-control" required >
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Countery:</strong>
                <select name="country"  >
                    <option value="ksa">ksa</option>
                  
                  
                  </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>City:</strong>
                <input type="text" name="city" class="form-control" required >
            </div>
        </div>




        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Time to Call:</strong>
                <input type="time" name="time_to_call" class="form-control"  >
            </div>
        </div>


        <br>
<br>
<br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Service:</strong>
               
                <select name="service"  >
                    <option value="w sender">window sender</option>
                    <option value="social media ads">social media ads</option>
                    <option value="social media mangment">social media manegment</option>
                    <option value="makeing website">makeing website</option>
                    <option value="makeing website">makeing mobile apps </option>
                  
                  </select>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Source:</strong>
                <select name="source"  >
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
            </div>
        </div>


        <br>
        <br>
        <br>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mony:</strong>
                <input type="number" name="mony" class="form-control"  required>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Note:</strong>
                <textarea class="form-control" style="height:150px" name="note" ></textarea>
            </div>
        </div>



        

       

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
              
                <strong>Department:</strong>
                <select name="department"  >
                    <option value="C Center">slaes</option>
                    <option value="sales">slaes</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Manegment">Manegment</option>
                   
                  
                  </select>
                  <br>
            </div>
        </div>


     

        <br>
        <br>









        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Employee:</strong>
                <select name="emp"  >
                    <option value="Ahmed">Ahmed</option>
                    <option value="Forsan">Forsan</option>
                   
                  
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