@extends('customer.customer')

@section('customerTable')

<div class="container">
    <h3>Customer Directory</h3>
    <hr>
    @if(count($customerData)>0)
    <table class="table table-bordered table-striped ">
        <thead class="thead-dark">
            <tr>
                <th>Customer Name</th>
                <th>Company Name</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($customerData as $data)
            <tr>
                <td>{{$data->customerName}}</td>
                <td>{{$data->companyName}}</td>
                <td><a href="{{ route('customer.editView',$data) }}" class="btn btn-info btn-sm">Edit</a>
                    <a class="btn btn-danger btn-sm"
                        onclick="if(!(confirm('Are you sure you want to delete this employee?')))return false"
                        href="{{ route('customer.delete',$data) }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$customerData->links()}}
    @else
    No records found
    @endif
    <hr>
</div>

@endsection



@section('edit')
<div class="container">

    <p class="h4 mb-4">Edit Customer</p>
    <form action="{{ route('customer.editView', $customer) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <input class="form-control mb-4" type="hidden" value="{{$customer->id}}" placeholder="{{$customer->id}}" disabled>
        </div>
        <div class="form-group">
            <input class="form-control mb-4 @error('customerName')inputError @enderror" type="text" id="customerName"
                name="customerName" value="{{$customer->customerName}}" placeholder="Customer Name">
            @error('customerName')
            <div class="errorMsg">{{$errors->first('customerName')}}</div>
            @enderror
        </div>
        <div class="form-group">
            <input class="form-control mb-4 @error('companyName')inputError @enderror" type="text" id="companyName" name="companyName"
                value="{{$customer->companyName}}" placeholder="Company Name">
            @error('companyName')
            <div class="errorMsg">{{$errors->first('companyName')}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-info col-2">Submit</button>
        <a href="{{ route('customer.createView') }}" class="btn btn-primary col-2">Back</a>
    </form>
</div>

@endsection