 
@extends('sidebar')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> </h2>
            </div>

 


        


        </div>
    </div>
    <br>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   


  
<!--
<br>

<form action="{{ route('persons_search') }}" method="GET">
    @csrf

    <div class="input-group">
        <input type="number" class="form-control rounded" placeholder="Search by Phone Number" aria-label="Search" aria-describedby="search-addon" name="search_key" />
        &nbsp      &nbsp
        <button type="submit" class="btn btn-outline-primary">search</button>
       
      </div>

</form>

<br>

-->







 

    <table class="table table-bordered">
        <tr>
            <th>No</th>
           
            <th>Date</th>
            <th>Time</th>
            <th>Lead Name</th>
            <th>Service</th>
            <th>Payed Mony</th>
           
        </tr>
        @foreach ($invoices as $invoice)
        @php
         $new_array = explode(' ',$invoice->created_at) ;
     @endphp
      
 
        <tr>
            <td>{{ ++$i }}</td>
            
           
             
            <td>{{ $new_array[0]}}</td>
            <td>{{ $new_array[1]}}</td>
            <td>{{ $invoice->name }}</td>
            <td>{{ $invoice->service }}</td>
            <td>{{ $invoice->payed_mony }}</td>
       
          
            <td>
                <form action="{{ route('persons.destroy',$invoice->id) }}" method="POST">
   
                   
    
                 
                    <div class="form-group">

                        <br>
                     
                        <a class="btn btn-primary" href="{{ route('make_invoice_excel',$invoice->id) }}">Download</a>
 
                       


                        <br>
                        <br>
                        

   
                        <br>
                        <br>
                       


                    </div>
                     
   
                    @csrf
                    @method('DELETE')
      <!--
                    <button type="submit" onclick="return confirm('Sure Want Delete?')"  class="btn btn-danger">Delete</button>


 <a class="btn btn-primary" href="{{ route('user_follow_up_logs',$invoice->id) }}">Follow up</a>


                        <br>
                        <br>
                        <a class="btn btn-primary" href="{{ route('complain_logs',$invoice->id) }}">complain</a>

      -->
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
  
    
    {!! $invoices->links() !!}
      
@endsection