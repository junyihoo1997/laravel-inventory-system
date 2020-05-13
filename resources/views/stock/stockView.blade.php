@extends('stock.stock')

@section('stockTable')

<div class="container">
    <h3>Stock Directory</h3>
    <hr>

    <!-- Add a button for add -->
    <a href="{{ route('stock.createView')}}" class="btn btn-primary btn-sm mb-3"> Add Stock </a>
    @if(count($stock)>0)
    <table class="table table-bordered table-striped ">
        <thead class="thead-dark">
            <tr>
                <th>Model Name</th>
                <th>Type</th>
                <th>Status</th>
                <th>Quantity</th>
                <th>Remark</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stock as $data)
            <tr>
                <td>{{$data->modelName}}</td>
                <td>{{$data->type}}</td>
                <td>{{$data->status}}</td>
                <td>{{$data->quantity}}</td>
                <td>{{$data->remark}}</td>
                <td><a href="{{ route('stock.editView',$data) }}" class="btn btn-info btn-sm">Edit</a>
                    <a class="btn btn-danger btn-sm"
                        onclick="if(!(confirm('Are you sure you want to delete this employee?')))return false"
                        href="{{ route('stock.delete',$data) }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <br> No records found
    @endif
</div>

@endsection