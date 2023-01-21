<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Service;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;
class ServiceController extends Controller
{
    public function index() : Response
    {
        
        $service=(collect(Service::all())->sortByDesc('active'))->values()->all();
        return Inertia::render('Admin/Services', [
            'admin' => request()->user(),
            'services' =>$service,
        ]);
    }

  
    public function show(Service $service) : Response
    {
        $service->load('rooms');
        return Inertia::render('Element/Service', [
            'admin' => request()->user(),
            'service' => $service,
        ]);
    } 
    public function edit(Service $service) : Response
    {
        $service->load('rooms');
        return Inertia::render('Element/Edit/Service', [
            'user' => request()->user(),
            'service' => $service,
        ]);
    }   
    public function store(Request $request) : RedirectResponse
    {
        Service::create(create($request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required','decimal:0,2'],
          ])));

        return redirect()->route('rooms');
    }
    public function create(Request $request): Response
    {
        return Inertia::render('Element/Create/Service', [
            'user' => request()->user(),
        ]);
    }
    public function update(Request $request, $id) : RedirectResponse
    {
        Service::find($id)->update($request->service);
        return redirect()->route('services');
    }
    public function destroy(Service $service) : RedirectResponse
    {
        $service->active = !$service->active;
        $service->save();
        return redirect('/services');
    }
    
}
