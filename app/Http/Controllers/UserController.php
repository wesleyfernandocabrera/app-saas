<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\UserProfile; 
use App\Models\UserInterest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        return view('users.index', compact('users'));

    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        User::create($input);

        return redirect()->route('users.index')->with('status', 'Usuario adicionando com sucesso.');
    }

    public function edit(User $user)
    {
            $user->load('profile', 'interests');
            $roles= role ::all();
            return view('users.edit', compact('user','roles'));
    }
    public function update(Request $request, User $user)
    {
        $input = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'exclude_if:password,null|min:8',
        ]);

        $user->update($input);

        return redirect()->route('users.index')->with('status', 'Usuario atualizado com sucesso.');
    }
    public function updateRoles(Request $request, User $user)
    {
        $input = $request->validate([
            'roles' => 'required|array',
        ]);

        $user->roles()->sync($input['roles']);

        return redirect()->route('users.index')->with('status', 'Funções atualizadas com sucesso.');
    }


    public function updateProfile(Request $request, User $user)
    {
        $input = $request->validate([
            'type' => 'required',
            'address' => 'nullable',
      
        ]);

        UserProfile::updateOrCreate(
            ['user_id' => $user->id],
            
        $input); 


        return redirect()->route('users.index')->with('status', 'Perfil atualizado com sucesso.');
    }
    public function updateInterests(Request $request, User $user)
    {
    $input = $request->validate([
        'interests' => 'nullable|array',
    ]);

    $user->interests()->delete();

 
    if (!empty($input['interests'])) {

        $interests = array_map(function($interest) use ($user) {
            return [
                'user_id' => $user->id,
                'interest' => $interest
            ];
        }, $input['interests']);

        $user->interests()->createMany($interests);
    }

    return redirect()->route('users.index')->with('status', 'Interesses atualizados com sucesso.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('status', 'Usuario removido com sucesso.');
    }

}
