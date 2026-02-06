<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class Subcategorycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = \App\Models\category::get();
        $subcat = Subcategory::get();
        $editdata = '';
        return view('subcategory', [
            'editdata' => $editdata,
            'catdata' => $categories,
            'subcatdata'=>$subcat
        ]);
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
        $request->validate([
            'subcatname' => 'required|min:3'], [
            'subcatname.required' => 'Please enter category',
            'subcatname.min' => 'Atleast 3 character should be enter'
        ]);
        $data = Subcategory::create([
            'subcatname' => $request->subcatname,
            'cat_id' => $request->cat_id
        ]);
        return redirect('/subcategory')->with('success', 'Subcategory save successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
