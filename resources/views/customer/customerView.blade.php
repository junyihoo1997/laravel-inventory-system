@extends('customer.customer')

@section('customerTable')

<div class="container">
    <h3>Customer Directory</h3>
    <hr>

    <!-- Add a button for add -->
    <a href="{{ route('customer.createView')}}" class="btn btn-primary btn-sm mb-3"> Add Customer </a>
    @if(count($customer)>0)
    <table class="table table-bordered table-striped ">
        <thead class="thead-dark">
            <tr>
                <th>Customer Name</th>
                <th>Company Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customer as $data)
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
    {{$customer->links()}}
    @else
    <br> No records found <br> <br>
    @endif
    <br>
    <hr>
    <p class="h4 mb-4">Search Customer Record</p>
    <form action="{{ route('customer.view') }}" method="POST">
        @csrf
        @method('GET')
        @if(count($customer)>0)
        <div class="form-group">
            <input class="form-control mb-4" type="text" id="customerName" name="customerName" value=""
                placeholder="Customer Name">
        </div>
        <button type="submit" class="btn btn-info col-2">Search</button>
        @else
        <button type="submit" class="btn btn-primary col-2">Refresh</button>
        @endif
    </form>
</div>

@endsection