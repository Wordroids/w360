<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::paginate(10);
        return view('pages.users.index')->with('users', $users);
    }

    public function create()
    {
        return view('pages.users.create');
    }

    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('pages.users.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        // Validate the request...
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();
    }

    
}
