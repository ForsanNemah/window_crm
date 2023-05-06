
 
@extends('sidebar')

























 
  
@section('content')

















<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Quotation</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('quotation_index_id',Session::get('id')) }}"> Back</a>
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





















































<form action="{{ route('quotation.update',$quotation->id) }}" method="POST">
   

    @csrf
    @method('PUT')

    <br>
    <br>
    
    
    <div class="row">
    
        <div class="col">



          
    
    
            <strong>no of expire days:</strong>
              <input type="number" value="{{$quotation->no_of_expire_days}}" name="no_of_expire_days" class="form-control"   required>
    
 
    






              <strong>pay way:</strong>
              <select name="pay_way"  class="form-control">
                <option value="{{$quotation->pay_way}}">{{$quotation->pay_way}}</option>
                <option value="cash money">cash money</option>
                <option value="deferred payment">deferred payment</option>
                <option value="purchase order">purchase order</option>
               
                  
                </select>












              <strong>price:</strong>
              <input type="number" value="{{$quotation->price}}" name="price" class="form-control"   >
    

              <strong>tax:</strong>
              <input type="number" value="{{$quotation->tax}}"  name="tax" class="form-control"   >


    
                <strong>total price:</strong>
                <input type="number" value="{{$quotation->total_price}}" name="total_price" class="form-control"  >
               
                <strong>start_date:</strong>
                <input type="date" value="{{$quotation->start_date}}" name="start_date" class="form-control"   >
 
                <strong>end_date:</strong>
                <input type="date" value="{{$quotation->end_date}}" name="end_date" class="form-control"   >
    
        </div>
        
    
    
    
    
    
    
    
    
    
    
        
        <div class="col">
            
            <strong>Description:</strong>
            <input type="text" value="{{$quotation->des}}" name="des" class="form-control"   >
    
            
          
  
    
             
    
    
    
  
    
    
    <br>
      
    
                  
    
                    <button type="submit" class="btn btn-primary">Submit</button>
    
          
        </div>
    </div>










</form>



<br>
 



















   <!--
    
   -->



@endsection

<script>

function myFunction() {
  var x = document.getElementById("departments_id").value;
alert(x);
}
 
</script>