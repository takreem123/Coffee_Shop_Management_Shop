@extends('layouts.coffee_shop')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users Data') }}</div>
                <div class="card-body">

             <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Full_Name</th>
                          <th scope="col">Address</th>
                          <th scope="col">City</th>
                          <th scope="col">Phone_Number</th> 
                          <th scope="col">Supplier</th> 
                          <th scope="col">Date_of_Join</th>
                          <th scope="col">Salary</th> 
                          <th scope="col">Email</th>  
                          <th scope="col">Role_id</th> 
                          <th scope="col">Status</th> 
                          <th scope="col">Picture</th>  
                                                         </tr>
                        @foreach($userDataList as $userData) 
                     
                        <tr>
                          <td>{{$userData['id']}}</td>
                          <td>{{$userData['fullname']}}</td>
                          <td>{{$userData['address']}}</td>
                          <td>{{$userData['city']}}</td>
                          <td>{{$userData['number']}}</td>
                          <td>{{$userData['supplier']}}</td>
                          <td>{{$userData['date_of_join']}}</td>
                          <td>{{$userData['salary']}}</td>
                          <td>{{$userData['email']}}</td>
                          <td>{{$userData['role_id']}}</td>
                          <td>{{$userData['status']}}</td>
                          <td>
                          <div class = "col-5">
                          <div class="card">
                            <img src="{{asset('storage/'.$userData->picture)}}" class="img img-rounded" style="height: 100px; weight: 100px;" alt="...">
                            <div class="card-body">
                            </div>
                        </td>
                          <td>
                             <a href={{"edit/".$userData['id']}}> Edit</a>
                             </td>  
                             <td>
                             <a href={{"delete/".$userData['id']}}> Delete</a>
                             </td>    
                               </tr>
                        @endforeach   
                        </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection