<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MusicalInstrument;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Musician;

class MusicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $musicians = Musician::paginate(10);

        return response()->json($musicians);
        [
            'success'=>true,
            'results'=>$musicians
        ];
    }

    public function user(){
        $users = User::all();

        return response()->json($users);
        [
            'success'=>true,
            'results'=>$users
        ];

    }

    public function instrument(){
        $instruments = MusicalInstrument::all();

        return response()->json($instruments);
        [
            'success'=>true,
            'results'=>$instruments
        ];
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $musician=Musician::findorFail($id);
        return response()->json($musician);
        [
            'success'=>true,
            'results'=>$musician
        ];
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
