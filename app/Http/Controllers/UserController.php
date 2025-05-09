<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $users = User::query();
    
        if ($search) {
            $users = $users->where('name', 'like', "%{$search}%")
                           ->orWhere('email', 'like', "%{$search}%");
        }
    
        $users = $users->get();
    
        return view('users.index', compact('users', 'search'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'registration_date' => now(),
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'Пользователь',
            'password' => bcrypt($request->password),
            'registration_date' => now(),
            'login' => $request->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('users.index');
    }

    public function showForm($id)
    {
        $user = User::find($id);
        return view('users.user', compact('user'));
    }
}
