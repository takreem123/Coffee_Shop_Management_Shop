@extends('layouts.coffee_shop')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Products Data') }}
                    <a type="submit" href={{route('prod_index')}} class ="float-right">
                        {{ __('Add Product') }}
                    </a>
                </div>
                <div class="card-body">

             <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Product_Name</th>
                          <th scope="col">Brand</th>
                          <th scope="col">Price</th>
                          <th scope="col">Quantity</th> 
                                                         </tr>
                        @foreach($productDataList as $productData) 
                     
                        <tr>
                          <td>{{$productData['id']}}</td>
                          <td>{{$productData['name']}}</td>
                          <td>{{$productData['brand']}}</td>
                          <td>{{$productData['price']}}</td>
                          <td>{{$productData['quantity']}}</td>
                          <td>
                             <a href={{"edit/".$productData['id']}}> Edit</a>
                             </td>  
                             <td>
                             <a href={{"delete/".$productData['id']}}> Delete</a>
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