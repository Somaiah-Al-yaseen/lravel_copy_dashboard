<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use App\Models\User;
use App\Models\trips;

use Illuminate\Http\Request;

class ReservatioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = reservation::with(['user:id,Fname', 'trip:id,trip_name'])->get();
        $data2= User::all();
        $data3= trips::all();

        return view('admin.Orders', compact('data','data2','data3'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $res = new reservation();
        $res->reservation_date=$request->input('reservation_date');
        $res->user_id =$request->input('user_id');
        $res->trip_id =$request->input('trip_id');
        $res->payment_status=$request->input('payment_status');

        $res->save();
        return redirect('/AdminOrders');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(reservation $reservatio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, $status)
    {
        //
        $res = reservation::find($id);
        $res->payment_status= $status;
        $res->update();
        return redirect('/AdminOrders');


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, reservation $reservatio)
    {
        //
        $id= $request->input('id');
        $res = reservation::find($id);
        if($request->input('reservation_date')){
            // dd($request->input('reservation_date'));
        $res->reservation_date= $request->input('reservation_date');
        $res->update();
    }
        return redirect('/AdminOrders');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $res = reservation::find($id);
        $res->delete();
        return redirect('/AdminOrders');    }
}
