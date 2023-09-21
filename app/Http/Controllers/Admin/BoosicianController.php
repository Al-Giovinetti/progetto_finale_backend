<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Musician;
use App\Models\MusicalInstrument;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BoosicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $musician=Musician::all();
        $user= Auth::user();
        $currentMusician=$user->musician;

        
        return view('admin.musicians.show',compact('currentMusician','musician','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        
        return view('admin.musicians.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        

    }

    /**
     * Display the specified resource.
     */
    public function show(Musician $musician)
    {   

        $user= Auth::user();
        $currentMusician=$user->musician;
        return view('admin.musicians.show',compact('currentMusician','user', 'musician'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Musician $loggedMusician)
    {
        $loggedMusician = Auth::user();
        $musician = Musician::all();
        // $currentMusician = $musician[($loggedMusician->id) - 1];

        $currentMusician = $musician;

        $currentMusician = Musician::findOrFail($loggedMusician->id);

        $musical_instruments = MusicalInstrument::all();
        

        return view('admin.musicians.edit', compact('currentMusician', 'loggedMusician','musical_instruments'));
        // return dd($currentMusician);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $user = Auth::user();
        $currentMusician = $user->musician;  //recupero il profilo del musicista assocciato all'utente attualmente connesso
        $data = $request->validate([
            'surname' => 'required',
            'birth_date' => 'required|date',
            'address' => 'required',
            'num_phone' => 'required',
            'image' => 'required', 
            'bio' => 'required',
            'cv' => 'required',
            'price' => 'required|numeric|max:9999',
            'musical_genre' => 'required',
            'musical_instruments' => ['exists:musical_instruments,id', 'required']
        ]);


        if ($request->hasFile('image')){
            $img_path = Storage::put('uploads/posts', $request['image']);
            $data['image'] = $img_path;
        }

        
        $currentMusician->update([
            'user_id' => $user->id,
            'surname' => $data['surname'],
            'birth_date' => $data['birth_date'],
            'address' => $data['address'],
            'num_phone' => $data['num_phone'],
            'image' => $data['image'],
            'bio' => $data['bio'],
            'cv' => $data['cv'],
            'price' => $data['price'],
            'musical_genre' => $data['musical_genre'],
            'musical_instruments' => $data['musical_instruments']
        ]);

        $currentMusician->save();

        if ($request->has('musical_instruments')) {
            $user->musician->musicalInstruments()->sync($request->musical_instruments);
        }

        return view('admin.musicians.show',compact('currentMusician', 'user'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $musician = Musician::find($id);
        $user->delete();
        $musician->delete();
        return redirect()->route('admin.home');
    }
}
