@extends('service.service')

@section('serviceTable')

<div class="container">
    <h3>Service Record Directory</h3>
    <hr>

    <!-- Add a button for add -->
    <table class="table table-bordered table-striped ">
        <thead class="thead-dark">
            <tr>
                <th>Model name</th>
                <th>Serial number</th>
                <th>FlowTag number</th>
                <th>Type</th>
                <th>Status</th>
                <th>Quantity</th>
                <th>Date In</th>
                <th>Date Out</th>
                <th>Remark</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$service->links()}}
    <hr>
</div>
@endsection



@section('create')

<div class="container">
    <p class="h4 mb-4">Add Service Record</p>
    <form action="{{ route('service.create') }}" method="POST">
        @csrf
        <div class="form-group">
            <input class="@error('modelName')inputError @enderror form-control mb-4" type="text" id="modelName"
                name="modelName" value="{{ old('modelName') }}" placeholder="Model Name">
            @error('modelName')
            <div class="errorMsg">{{$errors->first('modelName')}}</div>
            @enderror
        </div>
        <div class="form-group">
            <input class="@error('serialNumber')inputError @enderror form-control mb-4" type="text" id="serialNumber"
                name="serialNumber" value="{{ old('serialNumber') }}" placeholder="Serial Number">
            @error('serialNumber')
            <div class="errorMsg">{{$errors->first('serialNumber')}}</div>
            @enderror
        </div>
        <div class="form-group">
            <input class="@error('flowTagNumber')inputError @enderror form-control mb-4" type="text" id="flowTagNumber"
                name="flowTagNumber" value="{{ old('flowTagNumber') }}" placeholder="FlowTag Number">
            @error('flowTagNumber')
            <div class="errorMsg">{{$errors->first('flowTagNumber')}}</div>
            @enderror
        </div>
        <div class="form-group">
            <input class="@error('type')inputError @enderror form-control mb-4" type="text" id="type" name="type"
                value="{{ old('type') }}" placeholder="Type">
            @error('type')
            <div class="errorMsg">{{$errors->first('type')}}</div>
            @enderror
        </div>
        <div class="form-group">
            <input class="@error('status')inputError @enderror form-control mb-4" type="text" id="status" name="status"
                value="{{ old('status') }}" placeholder="Status">
            @error('status')
            <div class="errorMsg">{{$errors->first('status')}}</div>
            @enderror
        </div>
        <div class="form-group">
            <input class="@error('quantity')inputError @enderror form-control mb-4" type="text" id="quantity"
                name="quantity" value="{{ old('modelName') }}" placeholder="Quantity">
            @error('quantity')
            <div class="errorMsg">{{$errors->first('quantity')}}</div>
            @enderror
        </div>
        <div class="form-group">
            <input class="@error('dateIn')inputError @enderror form-control mb-4" name="dateIn" type="date"
                value="{{ old('dateIn') }}" id="dateIn" placeholder="Date In">
            @error('dateIn')
            <div class="errorMsg">{{$errors->first('dateIn')}}</div>
            @enderror
        </div>
        <div class="form-group">
            <input class="@error('dateOut')inputError @enderror form-control mb-4" name="dateOut" type="date"
                value="{{ old('dateOut') }}" id="dateOut" placeholder="Date Out">
            @error('dateOut')
            <div class="errorMsg">{{$errors->first('dateOut')}}</div>
            @enderror
        </div>

        <div class="form-group">
            <input class="@error('remark')inputError @enderror form-control mb-4" type="text" id="remark" name="remark"
                value="{{ old('remark') }}" placeholder="Remark">
            @error('remark')
            <div class="errorMsg">{{$errors->first('remark')}}</div>
            @enderror
        </div>

        <!-- <div class="input-group mb-3">
            <select class="custom-select" id="inputGroupSelect02">
                <option selected value="1">Choose Customer...</option>
                @foreach ($customer as $data)
                <option value="{{$data->id}}">{{$data->customerName}}</option>
                @endforeach

                @error('customerId')
                <div class="errorMsg">{{$errors->first('customerId')}}</div>
                @enderror
            </select>
        </div> -->

        <button type="submit" class="btn btn-info col-2">Submit</button>
        <a href="{{ route('service.view') }}" class="btn btn-primary col-2">Back</a>
    </form>
</div>

@endsection