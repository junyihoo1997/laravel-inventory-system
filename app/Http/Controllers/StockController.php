<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;



class StockController extends Controller
{
    //

    public function view()
    {
        $stockData = Stock::all();
        return view('stock.stockView', [
            'stock'=> $stockData
        ]);
    }

    public function createView()
    {
        // $stockData = Stock::take(10)->latest()->get();
        $stockData = Stock::all();
        return view('stock.stockCreate', [
            'stock'=> $stockData
        ]);       
    }

    public function create()
    {
        $stock = new Stock();
        $stock->modelName = request('modelName');
        $stock->type = request('type');
        $stock->quantity = request('quantity');
        $stock->status = request('status');
        $stock->remark = request('remark');
        $stock->save();
        return redirect('/stock');        
    }
    
    public function editView($id)
    {
        $stock = Stock::find($id);
        $stockData = Stock::all();
        return view('stock.stockEdit', [
            'stockData'=> $stockData,
            'stock' => $stock
        ]);      
    }

    public function edit($id)
    {
        $stock = Stock::find($id);
        $stock->modelName = request('modelName');
        $stock->type = request('type');
        $stock->quantity = request('quantity');
        $stock->status = request('status');
        $stock->remark = request('remark');
        $stock->save();
        return redirect('/stock');        
    }

    public function delete($id)
    {
        $stock = Stock::find($id);
        $stock->delete();
        return redirect('/stock');             
    }
}