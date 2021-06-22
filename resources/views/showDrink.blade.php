@extends('layouts.coffee_shop')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Drinks Data') }}
                    <a type="submit" href={{route('drink_index')}} class ="float-right">
                        {{ __('Add Drink') }}
                    </a>
                </div>
                <div class="card-body">

             <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Drink_Name</th>
                          <th scope="col">Price</th>
                          <th scope="col">Picture</th>
                                                         </tr>
                        @foreach($drinkDataList as $drinkData) 
                     
                        <tr>
                          <td>{{$drinkData['id']}}</td>
                          <td>{{$drinkData['name']}}</td>
                          <td>{{$drinkData['price']}}</td>
                          <td>
                            <div class = "col-5">
                            <div class="card">
                              <img src="{{asset('storage/'.$drinkData->picture)}}" class="img img-rounded" style="height: 100px; weight: 100px;" alt="...">
                              <div class="card-body">
                              </div>
                          </td>
                          <td>
                             <a href={{"edit/".$drinkData['id']}}> Edit</a>
                             </td>  
                             <td>
                             <a href={{"delete/".$drinkData['id']}}> Delete</a>
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