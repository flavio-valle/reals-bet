<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        try {
            $users = User::all();
            return Inertia::render('Users/Index', [
                'users' => $users,
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching users: ' . $e->getMessage());
            return redirect()->route('users.index')->with('error', 'Erro ao buscar usuários');
        }
    }

    public function create()
    {
        try {
            return Inertia::render('Users/Create');
        } catch (\Exception $e) {
            Log::error('Error rendering create user page: ' . $e->getMessage());
            return redirect()->route('users.index')->with('error', 'Erro ao carregar página de criação de usuário');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('users.index')->with('message', 'Usuário criado com sucesso');
        } catch (\Exception $e) {
            Log::error('Error creating user: ' . $e->getMessage());
            return redirect()->route('users.index')->with('error', 'Erro ao criar usuário');
        }
    }

    public function edit(User $user)
    {
        try {
            return Inertia::render('Users/Edit', [
                'user' => $user
            ]);
        } catch (\Exception $e) {
            Log::error('Error rendering edit user page: ' . $e->getMessage());
            return redirect()->route('users.index')->with('error', 'Erro ao carregar página de edição de usuário');
        }
    }

    public function update(Request $request, User $user)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            ]);

            $user->update($request->only(['name', 'email']));

            return redirect()->route('users.index')->with('message', 'Usuário atualizado com sucesso');
        } catch (\Exception $e) {
            Log::error('Error updating user: ' . $e->getMessage());
            return redirect()->route('users.index')->with('error', 'Erro ao atualizar usuário');
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('users.index')->with('message', 'Usuário inativado com sucesso');
        } catch (\Exception $e) {
            Log::error('Error deleting user: ' . $e->getMessage());
            return redirect()->route('users.index')->with('error', 'Erro ao inativar usuário');
        }
    }
}
