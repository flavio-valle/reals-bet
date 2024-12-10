<?php

namespace App\Http\Controllers;

use App\Models\Comission;
use App\Models\Affiliate;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ComissionsController extends Controller
{
    public function index()
    {
        $comissions = Comission::with('affiliate')->paginate(10);

        return Inertia::render('Comissions/Index', [
            'comissions' => $comissions,
        ]);
    }

    public function create()
    {
        $affiliates = Affiliate::all(['id', 'name']);
        return Inertia::render('Comissions/Create', [
            'affiliates' => $affiliates,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'affiliate_id' => 'required|exists:affiliates,id',
            'value' => 'required|numeric',
            'date' => 'required|date',
            'description' => 'nullable|string|max:255',
        ]);

        Comission::create($request->all());

        return redirect()->route('comissions.index')->with('message', 'Comissão criada com sucesso.');
    }

    public function edit(Comission $comission)
    {
        $affiliates = Affiliate::all(['id', 'name']);
        return Inertia::render('Comissions/Edit', [
            'comission' => $comission,
            'affiliates' => $affiliates,
        ]);
    }

    public function update(Request $request, Comission $comission)
    {
        $request->validate([
            'affiliate_id' => 'required|exists:affiliates,id',
            'value' => 'required|numeric',
            'date' => 'required|date',
            'description' => 'nullable|string|max:255',
        ]);

        $comission->update($request->all());

        return redirect()->route('comissions.index')->with('message', 'Comissão atualizada com sucesso.');
    }

    public function destroy(Comission $comission)
    {
        $comission->delete();

        return redirect()->route('comissions.index')->with('message', 'Comissão excluída com sucesso.');
    }
}
