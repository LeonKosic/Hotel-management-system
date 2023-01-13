<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Service;
use Inertia\Response;
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
}
