
 
@extends('sidebar')

























 
  
@section('content')

















<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create Sales Order </h2>
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
    
            
          
  
      
            <strong>Invoice Type:</strong>
            <select name="invoice_type"  class="form-control">

                <option value="cash money">cash money</option>
                <option value="in cash in installments">in cash in installments</option>
                <option value="deferred payment">deferred payment</option>
                <option value="purchase order">purchase order</option>
              </select>






              <strong>Payed Mony:</strong>
              <input type="text" value="{{$quotation->payed_mony}}" name="payed_mony" class="form-control"   >









              <strong>customer acceptance:</strong>
              <select name="customer_acceptance"  class="form-control">
      
                <option value="{{$quotation->customer_acceptance}}">{{$quotation->customer_acceptance}}</option>
                <option value="Rejected">Rejected</option>
                <option value="Approved">Approved</option>
               
                  
                </select>




 




                  @if ( Auth::user()->user_type=="smanger"  )

                  <strong>sales manger acceptance:</strong>
                  <select name="sales_manger_acceptance"  class="form-control">
                    <option value="{{$quotation->sales_manger_acceptance}}">{{$quotation->sales_manger_acceptance}}</option>
                    <option value="Rejected">Rejected</option>
                    <option value="Approved">Approved</option>
                   
                      
                    </select>


                    @else


                    <strong>sales manger acceptance:</strong>
                    <select name="sales_manger_acceptance"  class="form-control">
                      <option value="{{$quotation->sales_manger_acceptance}}">{{$quotation->sales_manger_acceptance}}</option>
                     
                     
                        
                      </select>



                  @endif

                

 






                  

                  @if ( Auth::user()->user_type=="acc"  )
                    <strong>accountant accpetnace:</strong>
                    <select name="accountant_accpetnace"  class="form-control">
      
                        <option value="{{$quotation->accountant_accpetnace}}">{{$quotation->accountant_accpetnace}}</option>
                      <option value="Rejected">Rejected</option>
                      <option value="Approved">Approved</option>
                     
                        
                      </select>

                      @else

                      <strong>accountant accpetnace:</strong>
                      <select name="accountant_accpetnace"  class="form-control">
        
                          <option value="{{$quotation->accountant_accpetnace}}">{{$quotation->accountant_accpetnace}}</option>
                  
                       
                          
                        </select>
  


@endif














@if ( Auth::user()->user_type=="itmanger"  )

<strong>it manger accpetnace:</strong>
<select name="it_manger_accpetnace"  class="form-control">

    <option value="{{$quotation->it_manger_accpetnace}}">{{$quotation->it_manger_accpetnace}}</option>
  <option value="Rejected">Rejected</option>
  <option value="Approved">Approved</option>
 
    
  </select>

  @else

  <strong>it manger accpetnace:</strong>
  <select name="it_manger_accpetnace"  class="form-control">
  
      <option value="{{$quotation->it_manger_accpetnace}}">{{$quotation->it_manger_accpetnace}}</option>
  
   
      
    </select>


@endif


















@if ( Auth::user()->user_type=="gmanger"  )
                    <strong>general manger acceptence:</strong>
                    <select name="general_manger_acceptence"  class="form-control">
                        <option value="{{$quotation->general_manger_acceptence}}">{{$quotation->general_manger_acceptence}}</option>
                      <option value="Rejected">Rejected</option>
                      <option value="Approved">Approved</option>
                     
                        
                      </select>


                      @else


                      <strong>general manger acceptence:</strong>
                      <select name="general_manger_acceptence"  class="form-control">
                          <option value="{{$quotation->general_manger_acceptence}}">{{$quotation->general_manger_acceptence}}</option>
                   
                       
                          
                        </select>          
    
    @endif





  












             
    
    
    
  
    
    
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