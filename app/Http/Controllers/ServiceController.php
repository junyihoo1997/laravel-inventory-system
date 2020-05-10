<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
    //


    public function view()
    {
        $serviceData = Service::all();
        return view('service.serviceView', [
            'service'=> $serviceData
        ]);
        return view('service.serviceView');
    }

    public function createView()
    {
        $serviceData = Service::all();
        return view('service.serviceCreate', [
            'service'=> $serviceData
        ]);       
    }

    public function create()
    {
        request()->validate([
            'modelName' => ['required','min:3','max:255'],
            'serialNumber' => ['required','min:3','max:255'],
            'flowTagNumber' => ['required','min:3','max:255'],
            'type' => ['required','min:3','max:255'],
            'quantity' => ['required','min:3','max:255'],
            'status' => ['required','min:3','max:255']
        ]);
        $service = new Service();
        $service->modelName = request('modelName');
        $service->serialNumber = request('serialNumber');
        $service->flowTagNumber = request('flowTagNumber');
        $service->type = request('type');
        $service->quantity = request('quantity');
        $service->status = request('status');
        $service->remark = request('remark');
        $service->save();
        return redirect('/service');     
    }
    
    public function editView($id)
    {
        $service = Service::find($id);
        $serviceData = Service::all();
        return view('service.serviceEdit', [
            'serviceData'=> $serviceData,
            'service' => $service
        ]);      
    }

    public function edit($id)
    {
        request()->validate([
            'modelName' => ['required','min:3','max:255'],
            'serialNumber' => ['required','min:3','max:255'],
            'flowTagNumber' => ['required','min:3','max:255'],
            'type' => ['required','min:3','max:255'],
            'quantity' => ['required','min:3','max:255'],
            'status' => ['required','min:3','max:255']
        ]);
        $service = Service::find($id);
        $service->modelName = request('modelName');
        $service->serialNumber = request('serialNumber');
        $service->flowTagNumber = request('flowTagNumber');
        $service->type = request('type');
        $service->quantity = request('quantity');
        $service->status = request('status');
        $service->remark = request('remark');
        $service->save();
        return redirect('/service');        
    }

    public function delete($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect('/service');             
    }
    
}