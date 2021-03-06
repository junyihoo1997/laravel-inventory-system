<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Customer;


class ServiceController extends Controller
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
            $serviceData = Service::where('modelName', 'LIKE', '%'.$modelName.'%')->paginate(10);
            return view('service.serviceView', [
                'service' => $serviceData
            ]);
        } else {
            $serviceData = Service::latest()->paginate(10);
            return view('service.serviceView', [
                'service' => $serviceData
            ]);
        }
    }

    public function createView()
    {
        $serviceData = Service::latest()->paginate(10);
        $customer = Customer::latest()->get();

        return view('service.serviceCreate', [
            'service' => $serviceData,
            'customer' => $customer
        ]);
    }

    public function create()
    {
        Service::create(request()->validate([
            'modelName' => ['required', 'min:3', 'max:255'],
            'serialNumber' => ['required', 'min:3', 'max:255'],
            'flowTagNumber' => ['required', 'min:3', 'max:255'],
            'type' => ['required', 'min:3', 'max:255'],
            'quantity' => ['required', 'min:1', 'numeric'],
            'status' => ['required', 'min:3', 'max:255'],
            'remark' => 'nullable',
            'dateIn' => 'date',
            'dateOut' => 'date'
        ]));
        return redirect(route('service.view'));
    }

    public function editView(Service $serviceId)
    {
        $serviceData = Service::latest()->paginate(10);
        return view('service.serviceEdit', [
            'serviceData' => $serviceData,
            'service' => $serviceId
        ]);
    }

    public function edit(Service $serviceId)
    {
        $serviceId->update(request()->validate([
            'modelName' => ['required', 'min:3', 'max:255'],
            'serialNumber' => ['required', 'min:3', 'max:255'],
            'flowTagNumber' => ['required', 'min:3', 'max:255'],
            'type' => ['required', 'min:3', 'max:255'],
            'quantity' => ['required', 'min:1','numeric'],
            'status' => ['required', 'min:3', 'max:255'],
            'remark' => 'nullable',
            'dateIn' => 'date',
            'dateOut' => 'date'
        ]));
        return redirect(route('service.view'));
    }

    public function delete(Service $serviceId)
    {
        $serviceId->delete();
        return redirect(route('service.view'));
    }
}
