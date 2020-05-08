@extends('service.service')

@section('serviceTable')

<div class="container">
    <h3>Service Record Directory</h3>
    <hr>

    <!-- Add a button for add -->
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
            </tr>
        </thead>
        <tbody>
            @foreach ($serviceData as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->modelName}}</td>
                <td>{{$data->serialNumber}}</td>
                <td>{{$data->flowTagNumber}}</td>
                <td>{{$data->type}}</td>
                <td>{{$data->status}}</td>
                <td>{{$data->remark}}</td>
                <td>{{$data->quantity}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>

@endsection



@section('edit')
<div class="container">
    <p class="h4 mb-4">Add Service Record</p>
    <form action="/service-edit/{{$service->id}}" target="_blank" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <input class="form-control mb-4" type="text" value="{{$service->id}}" placeholder="{{$service->id}}" disabled>
        </div>
        <div class="form-group">
            <input class="form-control mb-4" type="text" id="modelName" name="modelName" value="{{$service->modelName}}"
                placeholder="Model Name">
        </div>
        <div class="form-group">
            <input class="form-control mb-4" type="text" id="serialNumber" name="serialNumber" value="{{$service->serialNumber}}"
                placeholder="Serial Number">
        </div>
        <div class="form-group">
            <input class="form-control mb-4" type="text" id="flowTagNumber" name="flowTagNumber" value="{{$service->flowTagNumber}}"
                placeholder="FlowTag Number">
        </div>
        <div class="form-group">
            <input class="form-control mb-4" type="text" id="type" name="type" value="{{$service->type}}" placeholder="Type">
        </div>
        <div class="form-group">
            <input class="form-control mb-4" type="text" id="quantity" name="quantity" value="{{$service->quantity}}" placeholder="Quantity">
        </div>
        <div class="form-group">
            <input class="form-control mb-4" type="text" id="status" name="status" value="{{$service->status}}" placeholder="Status">
        </div>
        <div class="form-group">
            <input class="form-control mb-4" type="text" id="remark" name="remark" value="{{$service->remark}}" placeholder="Remark">
        </div>
        <button type="submit" class="btn btn-info col-2">Submit</button>
    </form>
</div>

@endsection