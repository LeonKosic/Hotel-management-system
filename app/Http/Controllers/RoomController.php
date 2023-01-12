<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Room;

class RoomController extends Controller
{    
    public function dashboard(Request $request)
    {
        return Inertia::render('Dashboard', [
            'user' => $request->user(),
            'rooms' => Room::where('active',1)->get()
        ]);
    }
    public function index(Request $request): Response
    {
        return Inertia::render('Admin/Rooms', [
            'user' => $request->user(),
            'rooms' => Room::all(),
        ]);
    }
    public function show(Room $room){
        return request()->user() -> name;   
    }
}
