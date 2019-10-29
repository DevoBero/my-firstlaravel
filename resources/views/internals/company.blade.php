@extends('layout')

@section('title', ' Company')

@section('content')
     <div class="row">
         <col class="col-12">
         <h1>Add Company</h1>
     </div>

    <div class="row">
        <div class="col-12">
            <form action="/company" method="POST">
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="test" name="name" value="{{old('name')}}" class="form-control">
                <div>{{$errors->first('name')}}</div>
            </div>

            
            <div class="form-group">
                <label for="email">Phone</label>
                <input type="test" name="phone" value="{{old('phone')}}" class="form-control">
                <div>{{$errors->first('phone')}}</div>
            </div>

            <button type="submit" class="btn btn-primary">Add Company</button>
            @csrf 
            </form>   
        </div>
    </div>

@endsection   