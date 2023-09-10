<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = category::all();
        return view('admin.Categories', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $cat = new category();
        $cat->category_name    = $request->input('cat_name');
        $img = $request->file('cat_img');
        $imgname = $img->getClientOriginalName();
        $img->move(public_path('assetsAdmin/images'), $imgname);
        $cat->category_picture = $imgname;
        $cat->save();
        return redirect('/AdminCategories');
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
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {

        $id = $request->input('id');
        $cat = category::find($id);
        $cat->category_name = $request->input('cat_name');
        if ($request->file('cat_img')) {
            $img = $request->file('cat_img');
            $imgname = $img->getClientOriginalName();
            $img->move(public_path('assetsAdmin/images'), $imgname);
            $cat->category_picture = $imgname;
        }
        
        $cat->update();
        return redirect('/AdminCategories');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $cat = category::find($id);
        $cat->delete();
        return redirect('/AdminCategories');

    }
}
