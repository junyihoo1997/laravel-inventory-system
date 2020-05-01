@extends('service.service')

@section('serviceTable')
<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100 ver1 m-b-110">
                <div class="table100-head">
                    <table id="stockTable">
                        <thead>
                            <tr class="row100 head">
                                <th class="cell100 column">ID</th>
                                <th class="cell100 column">Model name</th>
                                <th class="cell100 column">Serial number</th>
                                <th class="cell100 column">FlowTag number</th>
                                <th class="cell100 column">Type</th>
                                <th class="cell100 column">Status</th>
                                <th class="cell100 column">Remark</th>
                                <th class="cell100 column">Quantity</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div class="table100-body js-pscroll">
                    <table>
                        <tbody>
                            @foreach ($serviceData as $data)
                            <tr class="row100 body">
                                <td id="idTd" class="cell100 column">{{$data->id}}</td>
                                <td id="modelNameTd" class="cell100 column">{{$data->modelName}}</td>
                                <td id="modelNameTd" class="cell100 column">{{$data->serialNumber}}</td>
                                <td id="modelNameTd" class="cell100 column">{{$data->flowTagNumber}}</td>
                                <td id="typeTd" class="cell100 column">{{$data->type}}</td>
                                <td id="statusTd" class="cell100 column">{{$data->status}}</td>
                                <td id="remarkTd" class="cell100 column">{{$data->remark}}</td>
                                <td id="quantityTd" class="cell100 column">{{$data->quantity}}</td>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



@section('edit')

<div class="container">
    <form action="/service-edit/{{$service->id}}" target="_blank" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="fname">ID:</label><br>
            <label for="fname">{{$service->id}}</label><br>
        </div>
        <div class="form-group">
            <label for="fname">Model name:</label><br>
            <input class="form-control" type="text" id="modelName" name="modelName" value="{{$service->modelName}}">
        </div>
        <div class="form-group">
            <label for="fname">Serial number:</label><br>
            <input class="form-control" type="text" id="serialNumber" name="serialNumber" value="{{$service->serialNumber}}">
        </div>
        <div class="form-group">
            <label for="fname">FlowTag number:</label><br>
            <input class="form-control" type="text" id="flowTagNumber" name="flowTagNumber" value="{{$service->flowTagNumber}}">
        </div>
        <div class="form-group">
            <label for="lname">Type:</label><br>
            <input class="form-control" type="text" id="type" name="type" value="{{$service->type}}">
        </div>
        <div class="form-group">
            <label for="lname">Quantity:</label><br>
            <input class="form-control" type="text" id="quantity" name="quantity" value="{{$service->quantity}}">
        </div>
        <div class="form-group">
            <label for="lname">Status:</label><br>
            <input class="form-control" type="text" id="status" name="status" value="{{$service->status}}">
        </div>
        <div class="form-group">
            <label for="lname">Remark:</label><br>
            <input class="form-control" type="text" id="remark" name="remark" value="{{$service->remark}}">
        </div>
        <input type="submit" value="Submit">
    </form>
</div>

@endsection