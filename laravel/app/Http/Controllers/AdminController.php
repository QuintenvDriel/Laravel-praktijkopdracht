<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pokemons;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index(Request $request)
        {
            if(Auth::user()->Admin == 1) {
            $users = User::all();
            if ($request->has('category')) {
                $pokemons = Pokemons::whereHas('category', function ($query) use ($request) {
                    $query->where('category_id', '=', $request->input('pokemon'));
                })->get();
            } else {
                $pokemons = Pokemons::all();
            }
            $categories = Category::all();

            return view('layouts.admin', compact('pokemons', 'categories', 'users'));
        } else {
                return view('/welcome');
            }
        }

        Public function admin() {
            $title = 'admin';
            if (Auth::user()->Admin) {
                $users = User::all();
                return view ('admin', compact ('users', 'title'));
            }
        }

        public function editAdmin(User $user) {
            $currentRights = $user -> Admin;
            if ($currentRights) {
                $newRights = false;
            } else {
                $newRights = true;
            }
            $user->Admin = $newRights;
            $user->save();

            return redirect(route('admin.admin', $user->id));
        }

        public function status(Request $request, $id)
        {
            $pokemon = User::find($request->user_id);
            $pokemon->status = $request->status;
            $pokemon->save();
            return redirect('layouts.admin');


    //       $pokemons = Pokemons::find($id);
    //       if ($pokemons->Status==1){
    //           $pokemons->Status = '0';
    //       } else{
    //           $pokemons->Status = '1';
    //       }
    //       $pokemons->update();
    //       return view('layouts.profile');

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
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            //
        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $title = 'Edit your Account';
            $user = User::find($id);

            return view('layouts.editUser', compact('user', 'title'));
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
                'name' => 'required',
                'email' => 'required',

            ]);

            $user = User::find($id);
            $user->update($request->all());

            return redirect('admin')->with('succes','Profile edited.');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy(User $user, Pokemons $pokemon)
        {
            $user->delete();
            return redirect('admin')->with('message','verwijderd');
        }
}
