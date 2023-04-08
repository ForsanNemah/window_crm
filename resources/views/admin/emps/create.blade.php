
 
@extends('sidebar')

 
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('emps.index') }}"> Back</a>
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
   
<form action="{{ route('emps.store') }}" method="POST">
    @csrf
  






    <div class="row my-3">

        <div class="col-md-6">
            <div class="form-outline">
                <strong></strong>
                <input type="text" name="name" class="form-control" placeholder="Name" required>
                 

            </div>


            <br>
            <div class="form-outline">
                <strong></strong>
                <input type="email" name="email" class="form-control" placeholder="Name" required>
                 
            </div>


            <br>
            <div class="form-outline">
                <strong></strong>
                <input type="password" name="password" class="form-control" placeholder="Name" required>
                 
            </div>



            <br>
            <div class="form-outline">
 
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
                 
            </div>


        </div>

        

    </div>






    <button type="submit" class="btn btn-primary">Submit</button>














     
   
</form>



@endsection

<script>

function myFunction() {
  var x = document.getElementById("departments_id").value;
alert(x);
}
 
</script>