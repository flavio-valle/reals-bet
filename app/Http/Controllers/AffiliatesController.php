<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\Models\State;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Exception;

class AffiliatesController extends Controller
{
    public function index()
    {
        try {
            return Inertia::render('Affiliates/Index', [
                'affiliates' => Affiliate::all(),
            ]);
        } catch (Exception $e) {
            //
        }
    }

    public function create()
    {
        try {
            $states = State::orderBy('nome')->get();
            return Inertia::render('Affiliates/Create', [
                'states' => $states,
            ]);
        } catch (Exception $e) {
            return redirect()->route('affiliates.index')->with([
                'flash' => [
                    'type' => 'error',
                    'message' => 'Erro ao carregar estados: ' . $e->getMessage(),
                ]
            ]);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'cpf' => 'required|string|unique:affiliates',
                'birth_date' => 'required|date',
                'email' => 'required|email|unique:affiliates',
                'phone' => 'required|string',
                'address' => 'required|string',
                'state' => 'required|string',
                'city' => 'required|string'
            ]);

            Affiliate::create($request->all());

            return redirect()->route('affiliates.index')->with([
                'flash' => [
                    'type' => 'success',
                    'message' => 'Afiliado criado com sucesso',
                ]
            ]);
        } catch (Exception $e) {
            return redirect()->route('affiliates.index')->with([
                'flash' => [
                    'type' => 'error',
                    'message' => 'Erro ao criar afiliado: ' . $e->getMessage(),
                ]
            ]);
        }
    }

    public function show(Affiliate $affiliate)
    {
        try {
            return Inertia::render('Affiliates/Show', [
                'affiliate' => $affiliate,
            ]);
        } catch (Exception $e) {
            return redirect()->route('affiliates.index')->with([
                'flash' => [
                    'type' => 'error',
                    'message' => 'Erro ao carregar afiliado: ' . $e->getMessage(),
                ]
            ]);
        }
    }

    public function edit(Affiliate $affiliate)
    {
        try {
            return Inertia::render('Affiliates/Edit', [
                'affiliate' => $affiliate,
                'states' => State::orderBy('nome')->get(),
            ]);
        } catch (Exception $e) {
            return redirect()->route('affiliates.index')->with([
                'flash' => [
                    'type' => 'error',
                    'message' => 'Erro ao carregar dados para edição: ' . $e->getMessage(),
                ]
            ]);
        }
    }

    public function update(Request $request, Affiliate $affiliate)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'cpf' => 'required|string|unique:affiliates,cpf,' . $affiliate->id,
                'birth_date' => 'required|date',
                'email' => 'required|email|unique:affiliates,email,' . $affiliate->id,
                'phone' => 'required|string',
                'address' => 'required|string',
                'state' => 'required|string',
                'city' => 'required|string'
            ]);

            $affiliate->update($request->all());

            return redirect()->route('affiliates.index')->with([
                'flash' => [
                    'type' => 'success',
                    'message' => 'Afiliado atualizado com sucesso',
                ]
            ]);
        } catch (Exception $e) {
            return redirect()->route('affiliates.index')->with([
                'flash' => [
                    'type' => 'error',
                    'message' => 'Erro ao atualizar afiliado: ' . $e->getMessage(),
                ]
            ]);
        }
    }

    public function destroy(Affiliate $affiliate)
    {
        try {
            $affiliate->delete();
            return redirect()->route('affiliates.index')->with([
                'flash' => [
                    'type' => 'success',
                    'message' => 'Afiliado inativado com sucesso',
                ]
            ]);
        } catch (Exception $e) {
            return redirect()->route('affiliates.index')->with([
                'flash' => [
                    'type' => 'error',
                    'message' => 'Erro ao inativar afiliado: ' . $e->getMessage(),
                ]
            ]);
        }
    }
}
