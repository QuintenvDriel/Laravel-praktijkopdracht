<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pokemons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PokemonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $pokemons = Pokemons::where('Name', 'like', '%' . $request->other . '%')
            ->orWhere('DexNumber', 'like', '%' . $request->other . '%')
            ->orWhere('Gen', 'like', '%' . $request->other . '%')
            ->orWhere('Type1', 'like', '%' . $request->other . '%')
            ->orWhere('Type2', 'like', '%' . $request->other . '%')
            ->get();
        $data2 = Category::all();
        return view('pokemon', compact('pokemons'), ['categories' => $data2]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->has('category')){
            $data = Pokemons::where('category_id', '=', $request->query('category'))->get();
        } else {
            $data = Pokemons::all();
        }
        $data2 = Category::all();
        return view('pokemon', ['pokemons' => $data, 'categories' => $data2]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data2 = Category::all();
        return view(('layouts.create'), ['categories' => $data2]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validatie
        $request->validate([
            'Name'=> 'required',
            'DexNumber'=> 'required',
            'Type1'=>'required',
            'Gen'=>'required',
            'Image'=>'required'
        ]);
        if ($request->hasFile('Image')){
            $request->validate([
                'Image' => 'mimes:jpeg,bmp,png'
            ]);
            $request->file('Image')->storePublicly('Image', 'public');
            $image = new Pokemons([
                "user_id"=> Auth::user()->id,
                "category_id" => $request->get('category_id'),
                "Name" => $request->get('Name'),
                "DexNumber" => $request->get('DexNumber'),
                "Type1" => $request->get('Type1'),
                "Type2" => $request->get('Type2'),
                "Gen" => $request->get('Gen'),
                "DexEntry" => $request->get('DexEntry'),
                "Image" => $request->file('Image')->hashName(),
            ]);
            $image->save();
        }

        return redirect()->route('pokemon.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pokemon = $id;
        return view('layouts.details', ['pokemon' => pokemons::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $pokemon = $id;
        $data2 = Category::all();
        return view('layouts.edit',['pokemon' => Pokemons::find($id),'categories' => $data2]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Name'=> 'required',
            'DexNumber'=> 'required',
            'Type1'=>'required',
            'Gen'=>'required',
            'Image'=>'required'
        ]);

        $request->file('Image')->storePublicly('Image', 'public');

        $pokemons = Pokemons::find($id);
        // Getting values
        $pokemons->category_id = $request->get('category_id');
        $pokemons->Name =  $request->get('Name');
        $pokemons->Dexnumber = $request->get('DexNumber');
        $pokemons->Type1 = $request->get('Type1');
        $pokemons->Type2 = $request->get('Type2');
        $pokemons->Gen = $request->get('Gen');
        $pokemons->Image = $request->file('Image')->hashName();
        $pokemons->DexEntry =$request->get('DexEntry');
        $pokemons->save();

        return redirect('pokemon')->with('success', 'Pokemon edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pokemons $pokemon, Category $data2)
    {
        $pokemon->delete();
        $data2->delete();
        return redirect('pokemon')->with('message','verwijderd');
    }
}
