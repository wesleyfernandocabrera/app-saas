<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));

    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $imput = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        User::create($imput);

        return redirect()->route('users.index')->with('status', 'Usuario adicionando com sucesso.');
    }

    public function edit(User $user)
    {
            return view('users.edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $imput = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'exclude_if:password,null|min:8',
        ]);

        $user->update($imput);

        return redirect()->route('users.index')->with('status', 'Usuario atualizado com sucesso.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('status', 'Usuario removido com sucesso.');
    }

}
