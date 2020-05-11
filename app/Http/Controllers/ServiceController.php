<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
    //


    public function view()
    {
        $serviceData = Service::latest()->get();
        return view('service.serviceView', [
            'service'=> $serviceData
        ]);
    }

    public function createView()
    {
        $serviceData = Service::latest()->get();
        return view('service.serviceCreate', [
            'service'=> $serviceData
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
            'remark' => ['min:3', 'max:255']
        ]));
        return redirect(route('service.view'));     
    }
    
    public function editView(Service $serviceId)
    {
        $serviceData = Service::latest()->get();
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
            'remark' => ['min:3', 'max:255']
        ]));
        return redirect(route('service.view'));        
    }

    public function delete(Service $serviceId)
    {
        $serviceId->delete();
        return redirect(route('service.view'));             
    }
    
}