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
                                <th class="cell100 column">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div class="table100-body js-pscroll">
                    <table>
                        <tbody>
                            @foreach ($service as $data)
                            <tr class="row100 body">
                                <td id="idTd" class="cell100 column">{{$data->id}}</td>
                                <td id="modelNameTd" class="cell100 column">{{$data->modelName}}</td>
                                <td id="modelNameTd" class="cell100 column">{{$data->serialNumber}}</td>
                                <td id="modelNameTd" class="cell100 column">{{$data->flowTagNumber}}</td>
                                <td id="typeTd" class="cell100 column">{{$data->type}}</td>
                                <td id="statusTd" class="cell100 column">{{$data->status}}</td>
                                <td id="remarkTd" class="cell100 column">{{$data->remark}}</td>
                                <td id="quantityTd" class="cell100 column">{{$data->quantity}}</td>
                                <td id="actionTD" class="cell100 column"><a href="/service-edit/{{$data->id}}">Edit</a><a href="/service-delete/{{$data->id}}">Delete</a>
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