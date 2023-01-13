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
        return Inertia::render('Admin/Services', [
            'admin' => request()->user(),
            'services' => Service::all(),
        ]);
    }
    public function show(Service $service) : Response
    {
        return Inertia::render('Element/User', [
            'admin' => request()->user(),
            'service' => $service,
        ]);
    } 
    public function edit(Service $service) : Response
    {
        return Inertia::render('Element/Edit/User', [
            'admin' => request()->user(),
            'service' => $service,
        ]);
    }
    public function destroy(Service $service) : RedirectResponse
    {
        $service->active = 0;
        $service->save();
        return redirect('/services');
    }
}
