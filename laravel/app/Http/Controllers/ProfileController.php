<?php

namespace App\Http\Controllers;

use App\Models\Pokemons;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = Auth::user();
        $pokemons = Pokemons::where('user_id', $users->id)->orderBy('id', 'desc')->get();

        return view('layouts.profile', compact('users', 'pokemons'));
    }

    public function status(Request $request, $id)
    {
        $title = 'profile';
        if (Pokemons::all()->Status) {
            $pokemons = Pokemons::all();
            return view('profile', compact('pokemons', 'title'));
        }
    }

    public function editStatus($id)
    {
        Pokemons::find($id);

        $pokemon = Pokemons::find($id);
        $currentStatus = $pokemon->Status;
        if ($currentStatus) {
            $newStatus = false;
        } else {
            $newStatus = true;
        }
        $pokemon->Status = $newStatus;
        $pokemon->save();

        return redirect(route('profile.index', $pokemon->id));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->id == $id) {
            $title = 'Edit your Account';
            $user = User::find($id);

            return view('layouts.editUser', compact('user', 'title'));
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',

        ]);

        $user = User::find($id);
        $user->update($request->all());

        return redirect('profile')->with('succes', 'Profile edited.');
//        return redirect(route('profile/index', $user->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
