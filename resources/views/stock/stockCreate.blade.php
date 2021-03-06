@extends('stock.stock')

@section('stockTable')
<div class="container">
    <h3>Stock Directory</h3>
    <hr>
    @if(count($stock)>0)
    <table class="table table-bordered table-striped ">
        <thead class="thead-dark">
            <tr>
                <th>Model Name</th>
                <th>Type</th>
                <th>Status</th>
                <th>Quantity</th>
                <th>Remark</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$stock->links()}}
    @else
         No records found
    @endif
    <hr>
</div>
@endsection


@section('create')

<div class="container">

    <p class="h4 mb-4">Add Stock</p>
    <form action="{{ route('stock.create') }}" method="POST">
        @csrf
        <div class="form-group">
            <input class="@error('modelName')inputError @enderror form-control mb-4" type="text" id="modelName"
                name="modelName" value="{{ old('modelName') }}" placeholder="Model Name">
            @error('modelName')
            <div class="errorMsg">{{$errors->first('modelName')}}</div>
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
                name="quantity" value="{{ old('quantity') }}" placeholder="Quantity">
            @error('quantity')
            <div class="errorMsg">{{$errors->first('quantity')}}</div>
            @enderror
        </div>
        <div class="form-group">
            <input class="@error('remark')inputError @enderror form-control mb-4" type="text" id="remark" name="remark"
                value="{{ old('remark') }}" placeholder="Remark">
            @error('remark')
            <div class="errorMsg">{{$errors->first('remark')}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-info col-2">Submit</button>
        <a href="{{ route('stock.view') }}" class="btn btn-primary col-2">Back</a>
    </form>
</div>

@endsection