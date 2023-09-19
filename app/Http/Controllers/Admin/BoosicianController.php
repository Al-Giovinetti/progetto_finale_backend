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

        // NON TOCCARE MAI PIU
        // NON TOCCARE MAI PIU
        // NON TOCCARE MAI PIU
        // NON TOCCARE MAI PIU
        // NON TOCCARE MAI PIU
        // NON TOCCARE MAI PIU


        $data = $request->all();
        $user = Auth::user();

        $newMusician = new Musician();
        $newMusician->user_id = $user->id;
        $newMusician->surname = $data['surname'];
        $newMusician->birth_date = $data['birth_date'];
        $newMusician->address = $data['address'];
        $newMusician->num_phone = $data['num_phone'];
        $newMusician->image = $data['image'];
        $newMusician->bio = $data['bio'];
        $newMusician->cv = $data['cv'];
        $newMusician->price = $data['price'];
         $newMusician->musical_genre = $data['musical_genre'];


        $newMusician->save();

        return ('hai aggiunto il tuo profilo');


    }

    /**
     * Display the specified resource.
     */
    public function show(Musician $musician)
    {   
        $musician=Musician::all();
        $user= Auth::user();
        $currentMusician=$user->musician;
        return view('admin.musicians.show',compact('currentMusician','musician'));
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
    public function update(Request $request, Musician $currentMusician, string $id)
    {   
        
        // 
        // $musician->surname = $request['surname'];
        // $musician->birth_date = $request['birth_date'];
        // $musician->address = $request['address'];
        // $musician->num_phone = $request['num_phone'];
        // $musician->image = $request['image'];
        // $musician->bio = $request['bio'];
        // $musician->cv = $request['cv'];
        // $musician->price = $request['price'];
        // $musician->musical_genre = $request['musical_genre'];
        
        $user = Auth::user();
        
        $data = $request->all();
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
        return dd($data, $currentMusician);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
