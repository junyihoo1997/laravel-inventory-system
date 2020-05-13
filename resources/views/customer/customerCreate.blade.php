@extends('customer.customer')

@section('customerTable')
<div class="container">
    <h3>Customer Directory</h3>
    <hr>

    <table class="table table-bordered table-striped ">
        <thead class="thead-dark">
            <tr>
                <th>Customer Name</th>
                <th>Company Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customer as $data)
            <tr>
                <td>{{$data->customerName}}</td>
                <td>{{$data->companyName}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$customer->links()}}
    <hr>
</div>
@endsection


@section('create')

<div class="container">

    <p class="h4 mb-4">Add Customer</p>
    <form action="{{ route('customer.create') }}" method="POST">
        @csrf
        <div class="form-group">
            <input class="@error('customerName')inputError @enderror form-control mb-4" type="text" id="customerName"
                name="customerName" value="{{ old('customerName') }}" placeholder="Customer Name">
            @error('customerName')
            <div class="errorMsg">{{$errors->first('customerName')}}</div>
            @enderror
        </div>

        <div class="form-group">
            <input class="@error('companyName')inputError @enderror form-control mb-4" type="text" id="companyName" name="companyName"
                value="{{ old('companyName') }}" placeholder="Company Name">
            @error('companyName')
            <div class="errorMsg">{{$errors->first('companyName')}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-info col-2">Submit</button>
        <a href="{{ route('customer.view') }}" class="btn btn-primary col-2">Back</a>
    </form>
</div>

@endsection