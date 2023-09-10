<?php

namespace App\Http\Controllers;

use App\Models\trips;
use App\Models\category;

use Illuminate\Http\Request;

class TripsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data = trips::with('category:id,category_name')->get();
        $data2= category::all();
        return view('admin.Trips', compact('data','data2'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $trp = new trips();
        $trp->trip_name    = $request->input('trip_name');
        $trp->price    = $request->input('trip_price');
        $trp->date    = $request->input('trip_date');
        
        $trp->clients    = $request->input('trip_clients');

        $img = $request->file('trip_img');
        $imgname = $img->getClientOriginalName();
        $img->move(public_path('assetsAdmin/images'), $imgname);
        $trp->photo = $imgname;

        $trp->days	    = $request->input('trip_days');
        $trp->details    = $request->input('trip_details');
        $trp->category_id     = $request->input('categories_id');


        $trp->save();
        return redirect('/AdminTrips');    }

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
    public function show(trips $trips)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->input('id');
        $trp = trips::find($id);
        $trp->trip_name = $request->input('trip_name');
        $trp->price = $request->input('trip_price');
        $trp->date = $request->input('trip_date');
        $trp->clients = $request->input('trip_clients');
        if ($request->file('trip_img')) {
            $img = $request->file('trip_img');
            $imgname = $img->getClientOriginalName();
            $img->move(public_path('assetsAdmin/images'), $imgname);
            $trp->photo = $imgname;

            $trp->days = $request->input('trip_days');
            $trp->details = $request->input('trip_details');
            $trp->category_id = $request->input('categories_id');





            $trp->update();
            return redirect('/AdminTrips');
        }


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, trips $trips)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $trp = trips::find($id);
        $trp->delete();
        return redirect('/AdminTrips');  
    }
}
