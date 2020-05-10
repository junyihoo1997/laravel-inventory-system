@extends('stock.stock')

@section('stockTable')

<div class="container">
    <h3>Stock Directory</h3>
    <hr>

    <table class="table table-bordered table-striped ">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Model name</th>
                <th>Type</th>
                <th>Status</th>
                <th>Remark</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stockData as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->modelName}}</td>
                <td>{{$data->type}}</td>
                <td>{{$data->status}}</td>
                <td>{{$data->remark}}</td>
                <td>{{$data->quantity}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
</div>

@endsection



@section('edit')
<div class="container">

    <p class="h4 mb-4">Edit Stock</p>
    <form action="/stock-edit/{{$stock->id}}" class="needs-validation" target="_blank" method="POST" novalidate>
        @csrf
        @method('PUT')
        <div class="form-group">
            <input class="form-control mb-4" type="text" value="{{$stock->id}}" placeholder="{{$stock->id}}" disabled>
        </div>
        <div class="form-group">
            <input class="form-control mb-4" type="text" id="modelName" name="modelName" value="{{$stock->modelName}}"
                placeholder="Model Name" required>
            <div class="invalid-feedback">Model name is required</div>
            <div class="test">{{$errors->first('modelName')}}</div>
        </div>
        <div class="form-group">
            <input class="form-control mb-4" type="text" id="type" name="type" value="{{$stock->type}}"
                placeholder="Type" required>
            <div class="invalid-feedback">Type is required</div>
            <div class="test">{{$errors->first('type')}}</div>
        </div>
        <div class="form-group">
            <input class="form-control mb-4" type="text" id="quantity" name="quantity" value="{{$stock->quantity}}"
                placeholder="Quantity" required>
            <div class="invalid-feedback">Quantity is required</div>
            <div class="test">{{$errors->first('quantity')}}</div>
        </div>
        <div class="form-group">
            <input class="form-control mb-4" type="text" id="status" name="status" value="{{$stock->status}}"
                placeholder="Status" required>
            <div class="invalid-feedback">Status is required</div>
            <div class="test">{{$errors->first('status')}}</div>
        </div>
        <div class="form-group">
            <input class="form-control mb-4" type="text" id="remark" name="remark" value="{{$stock->remark}}"
                placeholder="Remark">
        </div>
        <button type="submit" class="btn btn-info col-2">Submit</button>
        <a href="/stock" class="btn btn-primary col-2">Back</a>
    </form>
</div>

@endsection