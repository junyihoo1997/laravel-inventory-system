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
        <form action="{{ route('service.edit', $service) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input class="form-control mb-4" type="text" value="{{$service->id}}" placeholder="{{$service->id}}"
                    disabled>
            </div>
            <div class="form-group">
                <input class="form-control mb-4 @error('modelName')inputError @enderror" type="text" id="modelName"
                    name="modelName" value="{{$service->modelName}}" placeholder="Model Name">
                @error('modelName')
                <div class="errorMsg">{{$errors->first('modelName')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control mb-4 @error('serialNumber')inputError @enderror" type="text"
                    id="serialNumber" name="serialNumber" value="{{$service->serialNumber}}"
                    placeholder="Serial Number">
                @error('serialNumber')
                <div class="errorMsg">{{$errors->first('serialNumber')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control mb-4 @error('flowTagNumber')inputError @enderror" type="text"
                    id="flowTagNumber" name="flowTagNumber" value="{{$service->flowTagNumber}}"
                    placeholder="FlowTag Number">
                @error('flowTagNumber')
                <div class="errorMsg">{{$errors->first('flowTagNumber')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control mb-4 @error('type')inputError @enderror" type="text" id="type" name="type"
                    value="{{$service->type}}" placeholder="Type">
                @error('type')
                <div class="errorMsg">{{$errors->first('type')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control mb-4 @error('quantity')inputError @enderror" type="text" id="quantity"
                    name="quantity" value="{{$service->quantity}}" placeholder="Quantity">
                @error('quantity')
                <div class="errorMsg">{{$errors->first('quantity')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control mb-4 @error('status')inputError @enderror" type="text" id="status"
                    name="status" value="{{$service->status}}" placeholder="Status">
                @error('status')
                <div class="errorMsg">{{$errors->first('status')}}</div>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control mb-4 @error('remark')inputError @enderror" type="text" id="remark"
                    name="remark" value="{{$service->remark}}" placeholder="Remark">
                @error('remark')
                <div class="errorMsg">{{$errors->first('remark')}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-info col-2">Submit</button>
            <a href="{{ route('service.view') }}" class="btn btn-primary col-2">Back</a>
        </form>
    </div>

    @endsection