<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mood;

class MoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Mood::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Mood::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Mood::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(Mood::where('id',$id)->exists()){
            $mood = Mood::find($id);
            $mood->name = $request->name;

            $mood->save();
            return response()->json([
                "message" => "record updated successfully"
            ], 200);
        }
        else{
            return response()->json([
                "messgae" => "Mood not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Mood::where('id',$id)->exists()){
            $mood = Mood::find($id);
            $mood->delete();

            return response()->json([
                "meesage" => "Mood deleted successfully"
            ], 200);
        }
        else{
            return response()->json([
                "message" => "Mood nor found"
            ], 404);
        }
    }
}
