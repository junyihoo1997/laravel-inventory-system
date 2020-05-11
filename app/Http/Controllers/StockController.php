<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Stock;



class StockController extends Controller
{
    //

    public function view()
    {
        $stockData = Stock::latest()->get();;
        return view('stock.stockView', [
            'stock' => $stockData
        ]);
    }

    public function createView()
    {
        $stockData = Stock::latest()->get();
        return view('stock.stockCreate', [
            'stock' => $stockData
        ]);
    }

    public function create()
    {
        Stock::create(request()->validate([
            'modelName' => ['required', 'min:3', 'max:255'],
            'type' => ['required', 'min:3', 'max:255'],
            'quantity' => ['required', 'min:3', 'max:255'],
            'status' => ['required', 'min:3', 'max:255'],
            'remark' => ['min:3', 'max:255']
        ]));
        return redirect(route('stock.view'));
    }

    public function editView(Stock $stockId)
    {
        $stockData = Stock::latest()->get();
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
            'quantity' => ['required', 'min:3', 'max:255'],
            'status' => ['required', 'min:3', 'max:255'],
            'remark' => ['min:3', 'max:255']
        ]));
        return redirect(route('stock.view'));
    }

    public function delete(Stock $stockId)
    {
        $stockId->delete();
        return redirect(route('stock.view'));
    }
}