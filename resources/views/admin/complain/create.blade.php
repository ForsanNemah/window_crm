
 
@extends('sidebar')
 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            
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
   
<form action="{{ route('complain.store') }}" method="POST">
    @csrf
  


   


















     <div class="row">



        <div class="col-md-6">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
                <strong> Note</strong>
                <input type="text" name="note" class="form-control" placeholder="Note" required>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
                <strong> Time to Call</strong>
                <input type="time" name="time_to_call" class="form-control"   required>
            </div>
        </div>






        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
              
                <strong>Complaint Status:</strong>
                <br>
                <select name="state" onchange="gsi();"   id="state_id"  >

                    
                    <option value="{{config('app.closed')}}">{{config('app.closed')}}</option>
                    <option value="{{config('app.opened')}}">{{config('app.opened')}}</option>
                    <option value="{{config('app.postponed')}}">{{config('app.postponed')}}</option>
                 
                    

         

 
  
                  
                  </select>
                  <br>
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
              
                <strong>Referred to :</strong>
                <br>
                <select name="referred_to"   id="departments_id"  >

                    <!--
                    <option value="C Center">C Center</option>
                    <option value="sales">slaes</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Manegment">Manegment</option>
                    -->

                    @foreach($users as $user )
    <option value="{{ $user->name }}">{{ $user->name }}</option>
  @endforeach


 
  
                  
                  </select>
                  <br>
            </div>
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
    var element = document.getElementById("v_id");
        element.style.display = "none";
        var element2 = document.getElementById("a_id");
        element2.style.display = "none";
}

 function gsi() {
  var x = document.getElementById("state_id").value;
//alert(x);
if(x.localeCompare("{{config('app.vis')}}")==0){


document.getElementById('v_id').style.display = 'block';
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