<?php
namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\Models\State;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AffiliatesController extends Controller
{
    public function index()
    {
        return Inertia::render('Affiliates/Index', [
            'affiliates' => Affiliate::all(),
        ]);
    }

    public function create()
{
    $states = State::orderBy('nome')->get();
    return Inertia::render('Affiliates/Create', [
        'states' => $states,
    ]);
}

    public function store(Request $request)
    {
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

        return redirect()->route('affiliates.index')->with('message', 'Afiliado criado com sucesso');
    }

    public function edit(Affiliate $affiliate)
{

    return Inertia::render('Affiliates/Edit', [
        'affiliate' => $affiliate,
        'states' => State::orderBy('nome')->get(),
    ]);
}

    public function update(Request $request, Affiliate $affiliate)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'required|string|unique:affiliates,cpf,'.$affiliate->id,
            'birth_date' => 'required|date',
            'email' => 'required|email|unique:affiliates,email,'.$affiliate->id,
            'phone' => 'required|string',
            'address' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string'
        ]);

        $affiliate->update($request->all());

        return redirect()->route('affiliates.index')->with('message', 'Afiliado atualizado com sucesso');
    }

    public function destroy(Affiliate $affiliate)
    {
        $affiliate->delete();
        return redirect()->route('affiliates.index')->with('message', 'Afiliado inativado com sucesso');
    }
}
