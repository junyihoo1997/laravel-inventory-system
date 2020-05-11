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
    <form action="{{ route('stock.editView', $stock) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <input class="form-control mb-4" type="text" value="{{$stock->id}}" placeholder="{{$stock->id}}" disabled>
        </div>
        <div class="form-group">
            <input class="form-control mb-4 @error('modelName')inputError @enderror" type="text" id="modelName"
                name="modelName" value="{{$stock->modelName}}" placeholder="Model Name">
            @error('modelName')
            <div class="errorMsg">{{$errors->first('modelName')}}</div>
            @enderror
        </div>
        <div class="form-group">
            <input class="form-control mb-4 @error('type')inputError @enderror" type="text" id="type" name="type"
                value="{{$stock->type}}" placeholder="Type">
            @error('type')
            <div class="errorMsg">{{$errors->first('type')}}</div>
            @enderror
        </div>
        <div class="form-group">
            <input class="form-control mb-4 @error('quantity')inputError @enderror" type="text" id="quantity"
                name="quantity" value="{{$stock->quantity}}" placeholder="Quantity">
            @error('quantity')
            <div class="errorMsg">{{$errors->first('quantity')}}</div>
            @enderror
        </div>
        <div class="form-group">
            <input class="form-control mb-4 @error('status')inputError @enderror" type="text" id="status" name="status"
                value="{{$stock->status}}" placeholder="Status">
            @error('status')
            <div class="errorMsg">{{$errors->first('status')}}</div>
            @enderror
        </div>
        <div class="form-group">
            <input class="form-control mb-4 @error('remark')inputError @enderror" type="text" id="remark" name="remark"
                value="{{$stock->remark}}" placeholder="Remark">
            @error('remark')
            <div class="errorMsg">{{$errors->first('remark')}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-info col-2">Submit</button>
        <a href="{{ route('stock.createView') }}" class="btn btn-primary col-2">Back</a>
    </form>
</div>

@endsection