@extends('layouts.coffee_shop')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update') }}</div>

                <div class="card-body">
                    <form method="POST" action="/edit" enctype="multipart/form-data">
                        @csrf 

<div class="form-row">
    <div class="form-group col-md-6">
    <input type = "hidden" name="id"  value="{{$data['id']}}" >
    <input type = "text" name="name" value="{{$data['name']}}"> <br><br>
    <input type = "text" name="price" value="{{$data['price']}}"> <br><br>
    <td>
        <div class = "col-5">
        <div class="card">
            <img src="{{asset('storage/'.$data->picture)}}" class="img img-rounded" style="height: 100px; weight: 100px;">
            <input type="file" name="picture" value="{{$data['picture']}}">
          <div class="card-body">
          </div>
      </td>

      <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Update') }}
            </button>
        </div>
    </div>

    
    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection