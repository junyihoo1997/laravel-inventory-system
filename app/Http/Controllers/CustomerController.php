<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;


class CustomerController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view()
    {
        $customerName = request('customerName');
        if ($customerName != "") {
            $customerData = Customer::where('customerName', 'LIKE', '%'.$customerName.'%')->paginate(10);
            return view('customer.customerView', [
                'customer' => $customerData
            ]);
        } else {
            $customerData = Customer::latest()->paginate(10);
            return view('customer.customerView', [
                'customer' => $customerData
            ]);
        }

        
    }

    public function createView()
    {
        $customerData = Customer::latest()->paginate(10);
        return view('customer.customerCreate', [
            'customer' => $customerData
        ]);
    }

    public function create()
    {
        Customer::create(request()->validate([
            'customerName' => ['required', 'min:3', 'max:255'],
            'companyName' => ['required', 'min:3', 'max:255']
        ]));
        return redirect(route('customer.view'));
    }

    public function editView(Customer $customerId)
    {
        $customerData = Customer::latest()->paginate(10);
        return view('customer.customerEdit', [
            'customerData' => $customerData,
            'customer' => $customerId
        ]);
    }

    public function edit(Customer $customerId)
    {
        $customerId->update(request()->validate([
            'customerName' => ['required', 'min:3', 'max:255'],
            'companyName' => ['required', 'min:3', 'max:255']
        ]));
        return redirect(route('customer.view'));
    }

    public function delete(Customer $customerId)
    {
        $customerId->delete();
        return redirect(route('customer.view'));
    }
}