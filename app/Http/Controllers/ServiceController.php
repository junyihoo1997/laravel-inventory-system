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
        $serviceData = Service::latest()->get();
        return view('service.serviceView', [
            'service'=> $serviceData
        ]);
    }

    public function createView()
    {
        $serviceData = Service::paginate(10);
        $customer = Customer::latest()->get();

        return view('service.serviceCreate', [
            'service'=> $serviceData,
            'customer' => $customer
        ]);       
    }

    public function create()
    {
        Service::create(request()->validate([
            'modelName' => ['required','min:3','max:255'],
            'serialNumber' => ['required','min:3','max:255'],
            'flowTagNumber' => ['required','min:3','max:255'],
            'type' => ['required','min:3','max:255'],
            'quantity' => ['required','min:3','max:255'],
            'status' => ['required','min:3','max:255'],
            'remark' => 'nullable',
            'dateIn' => 'date|nullable',
            'dateOut' => 'date|nullable'
        ]));
        return redirect(route('service.view'));     
    }
    
    public function editView(Service $serviceId)
    {
        $serviceData = Service::paginate(10);
        return view('service.serviceEdit', [
            'serviceData'=> $serviceData,
            'service' => $serviceId
        ]);      
    }

    public function edit(Service $serviceId)
    {
        $serviceId->update(request()->validate([
            'modelName' => ['required','min:3','max:255'],
            'serialNumber' => ['required','min:3','max:255'],
            'flowTagNumber' => ['required','min:3','max:255'],
            'type' => ['required','min:3','max:255'],
            'quantity' => ['required','min:3','max:255'],
            'status' => ['required','min:3','max:255'],
            'remark' => 'nullable',
            'dateIn' => ['min:3','max:255'],
            'dateOut' => ['min:3', 'max:255']
        ]));
        return redirect(route('service.view'));        
    }

    public function delete(Service $serviceId)
    {
        $serviceId->delete();
        return redirect(route('service.view'));             
    }
    
}