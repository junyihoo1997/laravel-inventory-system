@extends('service.service')

@section('serviceTable')

<div class="container">
    <h3>Service Record Directory</h3>
    <hr>

    <!-- Add a button for add -->
    <a href="{{ route('service.createView')}}" class="btn btn-primary btn-sm mb-3"> Add Service Record </a>
    @if(count($service)>0)
    <table class="table table-bordered table-striped ">
        <thead class="thead-dark">
            <tr>
                <th>Model Name</th>
                <th>Serial Number</th>
                <th>FlowTag Number</th>
                <th>Type</th>
                <th>Status</th>
                <th>Quantity</th>
                <th>Date In</th>
                <th>Date Out</th>
                <th>Remark</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($service as $data)
            <tr>
                <td>{{$data->modelName}}</td>
                <td>{{$data->serialNumber}}</td>
                <td>{{$data->flowTagNumber}}</td>
                <td>{{$data->type}}</td>
                <td>{{$data->status}}</td>
                <td>{{$data->quantity}}</td>
                <td>{{date('d/m/Y', strtotime($data->dateIn))}}</td>
                <td>{{date('d/m/Y', strtotime($data->dateOut))}}</td>
                <td>{{$data->remark}}</td>
                <td><a href="{{ route('service.editView',$data)}}" class="btn btn-info btn-sm">Edit</a>
                    <a class="btn btn-danger btn-sm"
                        onclick="if(!(confirm('Are you sure you want to delete this employee?')))return false"
                        href="{{ route('service.delete',$data)}}">Delete</a>
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