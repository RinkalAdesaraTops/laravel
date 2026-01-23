<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use \App\Models\category;

class category extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = \App\Models\category::get();
        $editdata = '';
        return view('category',[
        'editdata'=>$editdata,    
        'catdata'=> $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = \App\Models\category::create(['catname'=>$request->catname]);
        return redirect('/category');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = \App\Models\category::get();
        $data = \App\Models\category::find($id);
        return view('category',[
            'editdata'=> $data,
            'catdata'=> $categories
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = \App\Models\category::findOrFail($id);
        $data->update(['catname'=>$request->catname]);
        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = \App\Models\category::findOrFail($id);
        $data->delete();
        return redirect('/category');
    }
}
