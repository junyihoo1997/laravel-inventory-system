@extends('service.service')

@section('serviceTable')

<div class="container">
    <h3>Service Record Directory</h3>
    <hr>

    <!-- Add a button for add -->
    <a href="{{ route('service.createView')}}" class="btn btn-primary btn-sm mb-3"> Add Service Record </a>
    <table class="table table-bordered table-striped ">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Model name</th>
                <th>Serial number</th>
                <th>FlowTag number</th>
                <th>Type</th>
                <th>Status</th>
                <th>Remark</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($service as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->modelName}}</td>
                <td>{{$data->serialNumber}}</td>
                <td>{{$data->flowTagNumber}}</td>
                <td>{{$data->type}}</td>
                <td>{{$data->status}}</td>
                <td>{{$data->remark}}</td>
                <td>{{$data->quantity}}</td>
                <td><a href="{{ route('service.editView',$data)}}" class="btn btn-info btn-sm">Edit</a>
                    <a class="btn btn-danger btn-sm"
                        onclick="if(!(confirm('Are you sure you want to delete this employee?')))return false"
                        href="{{ route('service.delete',$data)}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection