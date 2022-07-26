<?php

// Author: Darwin Plata
// Date: Fri Jul 22, 2022

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Return all points
        return Point::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Returns a particular point
        $pointRow = new Point;
        $results = $pointRow->where('id', $id)->first();
        return response()->json($results);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Validate values */
        $request->validate([
            'name'=>'required',
            'x'=>'required',
            'y'=>'required'
        ]);

        /* Create a new point */
        $pointRow = new Point; 
        $pointRow->name = $request->name;
        $pointRow->x = $request->x;
        $pointRow->y = $request->y;
        $pointRow->save();
        return response()->json("Row created successfully");   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /* Update an existing point */
        $pointRow = Point::find($id);
        $pointRow->name = $request->name;
        $pointRow->x = $request->x;
        $pointRow->y = $request->y;
        $pointRow->save();
        return response()->json("Now it's working: Row updated successfully"); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pointRow = Point::find($id);
        $pointRow->delete();
        return response()->json("Row deleted successfully"); 
    }
}
