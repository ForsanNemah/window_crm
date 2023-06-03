
 
@extends('sidebar')

 
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('emps.index') }}"> Back</a>
            <br>
            <br>
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
   
<form action="{{ route('users_report_filter') }}" method="POST">
    @csrf
  

















    <div class="input-group">
        <strong>From:</strong>&nbsp
        <input type="date" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" name="from"   />
        &nbsp<strong>To:</strong>&nbsp
        <input type="date" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" name="to"   />
       
      </div>













<br>

      <div class="input-group">
 
                <select name="action"  class="form-control rounded" >
                    <option value="1">No of Added Leads</option>
                    <option value="2">No of Quotation</option>
                    <option value="3">No of Folllow Up</option>
                    <option value="4">No of Sold</option>
                    
                  
                  </select>

                </div>


  


        





         











 


        </div>

        

    </div>




<br>

    <button type="submit" class="btn btn-primary">Show</button>














     
   
</form>



@endsection

<script>

function myFunction() {
  var x = document.getElementById("departments_id").value;
alert(x);
}
 
</script>


<style>

select {
    text-align: center;
    text-align-last: center;
    -moz-text-align-last: center;
}

</style>