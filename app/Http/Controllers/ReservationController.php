<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
class ReservationController extends Controller
{
    public function index() : Response
    {
        $now =now();
        $reservations = Reservation::where('reservation_end', '>=', $now);
        if(request()->user()->type!=1){
            $reservations = $reservations->where('user_id',request()->user()->id);
        }
        $reservations=$reservations->get();
        $reservations->load(['room', 'user', 'services']);
        $reservations = collect($reservations)->sortBy(['active', 'asc']);
        $reservations = $reservations->values()->all();
        //var_dump($reservations);
        return Inertia::render('Element/Reservations', [
            'user' => request()->user(),
            'reservations' => $reservations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() :RedirectResponse
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ress=Reservation::where('room_id',$request->data['room_id'])->whereBetween('reservation_start',[$request->data['dateStart'],$request->data['dateEnd']])->first();
        $resss =Reservation::where('room_id',$request->data['room_id'])->whereBetween('reservation_end',[$request->data['dateStart'],$request->data['dateEnd']])->first();
       
        if($request->data['dateEnd']<=$request->data['dateStart']||$request->data['dateStart']<date('Y-m-d')|| $ress || $resss ){ 
            $room=Room::find($request->data['room_id']);
            $room->load('services');
            return  Inertia::render("Element/Room", [
                'user'=> request()->user(),
                'room'=> $room,
                'inputDate'=>false
            ]);  
        }else{
            $res = new Reservation;
            //return $request;
                $res->user_id = $request->data['user_id'];
                $res->room_id = $request->data['room_id'];
                $res->reservation_start=$request->data['dateStart'];
                $res->reservation_end=$request->data['dateEnd'];
                $res->price = $request->data['price'];
                
                
                $res->save();
                foreach($request->data['services'] as $value){
                    $res->services()->attach($value);
                }
            return redirect()->route('reservations');
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show() : Response
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit() : Response
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Reservation $res) : RedirectResponse
    {
        $res->active = !$res->active;
        return redirect()->route('reservations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) : RedirectResponse
    {
        Reservation::destroy($id);
        return redirect()->route('reservations');
    }
}
