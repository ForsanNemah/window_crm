
 
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





















































<form action="{{ route('quotation.store') }}" method="POST">
    @csrf

 

    <br>
    <br>
    
    
    <div class="row">
    
        <div class="col">



          
    
    
            <strong>no of expire days:</strong>
              <input type="number" name="no_of_expire_days" class="form-control"   required>
    
       
    





              <strong>pay way:</strong>
              <select name="pay_way"  class="form-control">
 
                <option value="cash money">cash money</option>
                <option value="deferred payment">deferred payment</option>
                <option value="purchase order">purchase order</option>
               
                  
                </select>









              <strong>price:</strong>
              <input type="number" name="price" class="form-control"   >
    

              <strong>tax:</strong>
              <input type="number" name="tax" class="form-control"   >


    
                <strong>total price:</strong>
                <input type="number" name="total_price" class="form-control"  >
               
                <strong>start_date:</strong>
                <input type="date" name="start_date" class="form-control"   >

                <strong>end_date:</strong>
                <input type="date" name="end_date" class="form-control"   >
    
        </div>
        
    
    
    
    
    
    
    
    
    
    
        
        <div class="col">
            
            <strong>Description:</strong>
            <input type="text" name="des" class="form-control"   >
    
            
          
  
    
             
    
    
    
  
    
    
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