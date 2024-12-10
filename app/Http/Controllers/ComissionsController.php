<?php

namespace App\Http\Controllers;

use App\Models\Comission;
use App\Models\Affiliate;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Exception;

class ComissionsController extends Controller
{
    public function index()
    {
        try {
            $comissions = Comission::with('affiliate')->paginate(10);

            return Inertia::render('Comissions/Index', [
                'comissions' => $comissions,
            ]);
        } catch (Exception $e) {
            return redirect()->route('comissions.index')->with('error', 'Erro ao carregar comissões.');
        }
    }

    public function create()
    {
        try {
            $affiliates = Affiliate::all(['id', 'name']);
            return Inertia::render('Comissions/Create', [
                'affiliates' => $affiliates,
            ]);
        } catch (Exception $e) {
            return redirect()->route('comissions.index')->with('error', 'Erro ao carregar dados para criação de comissão.');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'affiliate_id' => 'required|exists:affiliates,id',
                'value' => 'required|numeric',
                'date' => 'required|date',
                'description' => 'nullable|string|max:255',
            ]);

            Comission::create($request->all());

            return redirect()->route('comissions.index')->with('message', 'Comissão criada com sucesso.');
        } catch (Exception $e) {
            return redirect()->route('comissions.index')->with('error', 'Erro ao criar comissão.');
        }
    }

    public function edit(Comission $comission)
    {
        try {
            $affiliates = Affiliate::all(['id', 'name']);
            return Inertia::render('Comissions/Edit', [
                'comission' => $comission,
                'affiliates' => $affiliates,
            ]);
        } catch (Exception $e) {
            return redirect()->route('comissions.index')->with('error', 'Erro ao carregar dados para edição de comissão.');
        }
    }

    public function update(Request $request, Comission $comission)
    {
        try {
            $request->validate([
                'affiliate_id' => 'required|exists:affiliates,id',
                'value' => 'required|numeric',
                'date' => 'required|date',
                'description' => 'nullable|string|max:255',
            ]);

            $comission->update($request->all());

            return redirect()->route('comissions.index')->with('message', 'Comissão atualizada com sucesso.');
        } catch (Exception $e) {
            return redirect()->route('comissions.index')->with('error', 'Erro ao atualizar comissão.');
        }
    }

    public function destroy(Comission $comission)
    {
        try {
            $comission->delete();

            return redirect()->route('comissions.index')->with('message', 'Comissão excluída com sucesso.');
        } catch (Exception $e) {
            return redirect()->route('comissions.index')->with('error', 'Erro ao excluir comissão.');
        }
    }
}
