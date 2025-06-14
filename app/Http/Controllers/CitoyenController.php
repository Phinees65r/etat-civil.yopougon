<?php

namespace App\Http\Controllers;

use App\Models\Citoyen;
use App\Models\ActeNaissance;
use App\Models\ActeMariage;
use App\Models\ActeDeces;
use App\Models\ActeDivorce;
use App\Models\Paiement;
use Illuminate\Http\Request;

class CitoyenController extends Controller
{
    public function create()
    {
        return view('citoyen.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'sexe' => 'required|string|in:homme,femme',
            'pays' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'type_acte' => 'required|string|in:naissance,mariage,deces,divorce',
        ]);

        $citoyen = Citoyen::create($validated);

        return redirect()->route('citoyen.registre', ['citoyen' => $citoyen->id]);
    }

    public function showRegistreForm(Citoyen $citoyen)
    {
        return view('citoyen.registre', compact('citoyen'));
    }

    public function verifyRegistre(Request $request, Citoyen $citoyen)
    {
        $request->validate([
            'numero_registre' => 'required|string|size:5',
        ]);

        $acte = null;
        $type = $citoyen->type_acte;
        
        switch($type) {
            case 'naissance':
                $acte = ActeNaissance::where('numero_registre', $request->numero_registre)->first();
                break;
            case 'mariage':
                $acte = ActeMariage::where('numero_registre', $request->numero_registre)->first();
                break;
            case 'deces':
                $acte = ActeDeces::where('numero_registre', $request->numero_registre)->first();
                break;
            case 'divorce':
                $acte = ActeDivorce::where('numero_registre', $request->numero_registre)->first();
                break;
        }

        if (!$acte) {
            return back()->withErrors(['numero_registre' => 'Numéro de registre introuvable']);
        }

        // Stocker l'acte dans la session
        session()->put('acte_a_payer', [
            'citoyen_id' => $citoyen->id,
            'type_acte' => $type,
            'numero_registre' => $acte->numero_registre,
            'acte_data' => $acte->toArray()
        ]);

        return view('citoyen.verification', compact('acte', 'citoyen', 'type'));
    }
}