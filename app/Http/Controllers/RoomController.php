<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
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
    public function dashboardSearch(Request $request){
        $rooms=collect(Room::where('active',1)->with('reservations')->get());
        $after=   $request->after;
        $before = $request->before;
        foreach($rooms as $key=>$var){
            $remove=false;
            $id = $var ->id;
            $ress=Reservation::where('room_id',$id)->whereBetween('reservation_start',[$before,$after])->first();
            $resss =Reservation::where('room_id',$id)->whereBetween('reservation_end',[$before,$after])->first();
            if($ress||$resss){
                $rooms->forget($key);
            }
        }
        return Inertia::render('Dashboard', [
            'user' => $request->user(),
            'rooms' =>$rooms->toArray(),
        ]);
    }
    public function syncServices(Room $room): Response{ 
        $services=Service::where('active',1)->get();
        return Inertia::render('Element/Edit/AddServices', [
            'room' => $room,
            'services' => $services
        ]);
    }
    public function addServices(Room $room):RedirectResponse{
        $room->services()->sync(request()->data['services']);
        return redirect()->route('rooms');
    }
    public function index(Request $request): Response
    {
        $rooms=(collect(Room::all())->sortByDesc('active'))->values()->all();
        return Inertia::render('Admin/Rooms', [
            'user' => $request->user(),
            'rooms' => $rooms,
        ]);
    }
    public function show(Room $room){
        $room->load('services');
        return Inertia::render("Element/Room", [
            'user'=> request()->user(),
            'room'=> $room,
            'inputDate'=>true
        ]);   
    }
    public function edit(Room $room){
        $room->load('services');
        return Inertia::render("Element/Edit/Room", [
            'user'=> request()->user(),
            'room'=> $room,
        ]);   
    }
    public function store(Request $request): RedirectResponse
    {
        Room::create($request->validate([
          'name' => ['required'],
          'description' => ['required'],
          'price' => ['required','decimal:0,2'],
        ]));

        return redirect()->route('rooms');
    }
    public function create(Request $request): Response
    {
        return Inertia::render('Element/Create/Room', [
            'user' => request()->user(),
        ]);
    }
    public function update(Request $request, $id) : RedirectResponse
    {
        Room::find($id)->update($request->room);
        return redirect()->route('rooms');
    }
    public function destroy(Room $room):RedirectResponse{
        $room->active = !$room->active;
        $room->save();   
        return redirect()->route('rooms');
    }
}
