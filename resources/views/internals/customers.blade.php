@extends('layout')

@section('title', ' Customer List')

@section('content')
     <div class="row">
         <col class="col-12">
         <h1>Customer List</h1>
     </div>

    <div class="row">
        <div class="col-12">
            <form action="customers" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="test" name="name" value="{{old('name')}}" class="form-control">
                    <div>{{$errors->first('name')}}</div>
                </div>


                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="test" name="email" value="{{old('email')}}" class="form-control">
                    <div>{{$errors->first('email')}}</div>
                </div>

                <div class="form-group">
                    <label for="active">Status</label>
                    <select name="active" id="active" class="form-control">
                        <option value=""disabled>Select Customer Status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="company_id">Company</label>
                    <select name="company_id" id="company_id" class="form-control">
                        <option>~ Please Select ~</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                    <div>{{$errors->first('company_id')}}</div>
                </div>

                <button type="submit" class="btn btn-primary">Add Customer</button>
                @csrf
            </form>
        </div>
    </div>

    <hr>
    <div class="row">

        <div class="col-6">
            <h2>Active Customers</h2>
            <ul>
                @foreach ($activeCustomers as $activeCustomer)
                <div>
                    <li>{{ $activeCustomer->name }} <span class="text-muted">({{ $activeCustomer->email }})</span></li>
                </div>
                @endforeach
            </ul>
        </div>
        <div class="col-6">
            <h2>Inactive Customers</h2>
            <ul>
                @foreach ($inactiveCustomers as $inactiveCustomer)
                <div>
                    <li>{{ $inactiveCustomer->name }} <span class="text-muted">({{ $inactiveCustomer->email }})</span></li>                </div>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @foreach ( $companies as $company )
                <h3>{{ $company->name}}</h3>
               <ul>
                    @foreach( $company->customers as $customer )
                        <li>{{ $customer->name }}</li>
                    @endforeach
               </ul>
            @endforeach
        </div>
    </div>
@endsection
