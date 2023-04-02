
 
@extends('sidebar')
 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('user_follow_up_logs',Session::get('id')) }}"> Back</a>
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
   
<form action="{{ route('follow_up.store') }}" method="POST">
    @csrf
  
     <div class="row">



    

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
                <strong></strong>
                <input type="text" name="note" class="form-control" placeholder="Note" required>
            </div>
        </div>








        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
              
                <strong>Status:</strong>
                <br>
                <select name="state" onchange="gsi();"   id="state_id"  >

                    
                    <option value="{{config('app.vi')}}">{{config('app.vi')}}</option>
                    <option value="{{config('app.vis')}}">{{config('app.vis')}}</option>
                    <option value="{{config('app.ap')}}">{{config('app.ap')}}</option>
                    <option value="{{config('app.hena')}}">{{config('app.hena')}}</option>
                    <option value="{{config('app.nr')}}">{{config('app.nr')}}</option>
                    <option value="{{config('app.wfa')}}">{{config('app.wfa')}}</option>
                    <option value="{{config('app.fu')}}">{{config('app.fu')}}</option>
                    <option value="{{config('app.lost')}}">{{config('app.lost')}}</option>
                    <option value="{{config('app.sold')}}">{{config('app.sold')}}</option>
                    <option value="{{config('app.res')}}">{{config('app.res')}}</option>
                    

         

 
  
                  
                  </select>
                  <br>
            </div>
        </div>











       
        
       



        <div class="col-xs-12 col-sm-12 col-md-12" id="a_id"  >
            <div class="form-group">
                <br>
                <strong>Date</strong>
                <input type="datetime-local" name="appointment_date" class="form-control" placeholder="Note" >
            </div>
        </div>

        
      

      







 







    















        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <br>
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>



@endsection

<script>

 
window.onload = function() {
  
   // alert("wwe");
 
        var element2 = document.getElementById("a_id");
        element2.style.display = "none";
}

 function gsi() {
  var x = document.getElementById("state_id").value;
//alert(x);
if(x.localeCompare("{{config('app.vis')}}")==0){


document.getElementById('a_id').style.display = 'block';
}



if(x.localeCompare("{{config('app.ap')}}")==0){


document.getElementById('a_id').style.display = 'block';
}
 


/*
var element = document.getElementById("v_id");
        element.style.display = "block";
        */
}


 
</script>