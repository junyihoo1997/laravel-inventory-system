<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Stock;
use phpDocumentor\Reflection\Types\Null_;

class StockController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view()
    {
        $modelName = request('modelName');
        if ($modelName != "") {
            $stockData = Stock::where('modelName', 'LIKE', '%'.$modelName.'%')->paginate(10);
            return view('stock.stockView', [
                'stock' => $stockData
            ]);
        } else {
            $stockData = Stock::paginate(10);
            return view('stock.stockView', [
                'stock' => $stockData
            ]);
        }
    }

    public function createView()
    {
        $stockData = Stock::paginate(10);
        return view('stock.stockCreate', [
            'stock' => $stockData
        ]);
    }

    public function create()
    {
        Stock::create(request()->validate([
            'modelName' => ['required', 'min:3', 'max:255'],
            'type' => ['required', 'min:3', 'max:255'],
            'quantity' => ['required', 'min:1','numeric'],
            'status' => ['required', 'min:3', 'max:255'],
            'remark' => 'nullable'
        ]));
        return redirect(route('stock.view'));
    }

    public function editView(Stock $stockId)
    {
        $stockData = Stock::paginate(10);
        // $stockData = Stock::latest()->get();
        return view('stock.stockEdit', [
            'stockData' => $stockData,
            'stock' => $stockId
        ]);
    }

    public function edit(Stock $stockId)
    {
        $stockId->update(request()->validate([
            'modelName' => ['required', 'min:3', 'max:255'],
            'type' => ['required', 'min:3', 'max:255'],
            'quantity' => ['required', 'min:1','numeric'],
            'status' => ['required', 'min:3', 'max:255'],
            'remark' => 'nullable'
        ]));
        return redirect(route('stock.view'));
    }

    public function delete(Stock $stockId)
    {
        $stockId->delete();
        return redirect(route('stock.view'));
    }
}
