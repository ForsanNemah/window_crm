
 
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
  




    <div class="row my-3">

        <div class="col-md-6">

            <br>
            <div class="form-outline">
                <strong>Note:</strong>
                <input type="text" name="note" class="form-control"   required>
            </div>

            
            <br>
            <div class="form-outline">
                <strong>Status:</strong>
                <br>
                <select name="state" onchange="gsi();"   id="state_id"  >

                    
              
                    

                    @foreach($statuses as $status )
                    <option value="{{ $status->name }}">{{ $status->name }}</option>
                  @endforeach
              

 
  
                  
                  </select>
            </div>









            <br>
            <div class="form-outline" id="a_id">
               
                <br>
                <strong>Date</strong>
                <input type="datetime-local" name="appointment_date" class="form-control" placeholder="Note" >
            </div>











        </div>

    </div>




    <button type="submit" class="btn btn-primary">Submit</button>




 
   
</form>



@endsection

<script>

 /*
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

*/
 
</script>