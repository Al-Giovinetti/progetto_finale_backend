<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Musician;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoosicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        ]);


        $user = Auth::user();

        $newMusician = Musician::create([
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
        ]);

        $newMusician->save();

        return ('hai aggiunto il tuo profilo');


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
    public function edit(Musician $loggedMusician)
    {
        $loggedMusician = Auth::user();
/*         $currentMusician = Musician::where('user_id', $loggedMusician)->get();
 */        /* $project = Project::findOrFail($id); */
        $musician = Musician::all();
        $currentMusician = $musician[($loggedMusician->id) - 1];

        /* return dd($currentMusician); */

        return view('admin.musicians.edit', compact('currentMusician', 'loggedMusician'));

        /* return dd($loggedMusician); */
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
        ]);
        
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
        ]);

        $currentMusician->save();
    
        return ('hai modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
