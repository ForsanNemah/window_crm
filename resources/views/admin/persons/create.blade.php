
 
@extends('sidebar')

























 
  
@section('content')

















<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Lead</h2>
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







    <br>
    <br>
    
    
    <div class="row">
    
        <div class="col">

            
            <label for="IDofInput">Title:</label> 
            <select name="title"  >
                <option value="Mr.">Mr. </option>
                <option value="Ms.">Ms.</option>
                <option value="Mr.">Mr.</option>
                <option value="Eng.">Eng.</option>
                <option value="Dr.">Dr.</option>
              </select>
    
    <br>
    <br>
    
    
            <strong>Name:</strong>
              <input type="text" name="name" class="form-control"   required>








              <br>
          

              <strong>Business Type:</strong>
              <br>
              <select name="business_type"   id="business_type_id"  >

                  

                  @foreach($business_types as $business_type )
  <option value="{{ $business_type->id }}">{{ $business_type->name }}</option>
@endforeach




                
                </select>


<br>
<br>











    
              <strong>Phone Number:</strong>
              <input type="number" name="phn" class="form-control" required >
    
              <strong>Phone Number 2:</strong>
              <input type="number" name="phn2" class="form-control"   >
    
    <br>
    
              <strong>Prefred Contact:</strong>
                  
              <select name="prefered_contact"  >
                  <option value="1"> 1 </option>
                  <option value="2">2</option>
                
                </select>
    <br>
    <br>
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control"  >
                <br>
                <strong>Address:</strong>
                <input type="text" name="address" class="form-control"   >
    
        </div>
        
    
    
    
    
    
    
    
    
    
    
        
        <div class="col">
            <br>
            <br>
            <strong>Area:</strong>
            <input type="text" name="area" class="form-control"   >
    
            
            <strong>Countery:</strong>
            <br>
            <select name="country"  >
                <option value="ksa">ksa</option>
              
              
              </select>
    <br>
    <br>
    
    
              <strong>City:</strong>
              <input type="text" name="city" class="form-control"   >
    
              <strong>Time to Call:</strong>
              <input type="time" name="time_to_call" class="form-control"  >
    
    
    
    <br>
              <strong>Service:</strong>
                   
              <select name="service"  >
                 
                @foreach($services as $service )
                <option value="{{ $service->name }}">{{ $service->name }}</option>
              @endforeach
                
                </select>
    
    
    
    <br>
    <br>
                <strong>Source:</strong>
                <select name="source"  >

                  

                    @foreach($sources as $source )
                    <option value="{{ $source->name }}">{{ $source->name }}</option>
                  @endforeach


                  
                  </select>
    
                  <br>
                  <strong>Note:</strong>
                  <textarea class="form-control" style="height:150px" name="note" ></textarea>
    
    
    <br>
    
                  <strong>Department:</strong>
                  <br>
                  <select name="department"   id="departments_id"  >
    
                      
    
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






   <!--
    
   -->



@endsection

<script>

function myFunction() {
  var x = document.getElementById("departments_id").value;
alert(x);
}
 
</script>