<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('admin.Users', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $usr = new User();
        $usr->Fname    = $request->input('user_fname');
        $usr->Lname    = $request->input('user_lname');
        $usr->password    = $request->input('user_pass');
        $usr->email    = $request->input('user_email');
        $usr->phone    = $request->input('user_phone');
        $usr->save();
        return redirect('/AdminUser');
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
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, $status)
    {
        $usr = User::find($id);
        $usr->is_admin= $status;
        $usr->update();
        return redirect('/AdminUser');    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usr = User::find($id);
        $usr->delete();
        return redirect('/AdminUser');    }
}
