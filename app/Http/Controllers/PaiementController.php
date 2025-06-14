<?php

namespace App\Http\Controllers;

use App\Models\Citoyen;
use App\Models\Paiement;
use App\Models\ActeNaissance;
use App\Models\ActeMariage;
use App\Models\ActeDeces;
use App\Models\ActeDivorce;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function create(Citoyen $citoyen)
    {
        // Vérifier qu'un acte est en attente de paiement
        if (!session()->has('acte_a_payer') || session('acte_a_payer.citoyen_id') != $citoyen->id) {
            return redirect()->route('citoyen.registre', ['citoyen' => $citoyen->id])
                ->withErrors(['message' => "Veuillez d'abord vérifier votre numéro de registre"]);
        }

        return view('paiement.create', compact('citoyen'));
    }

    public function store(Request $request, Citoyen $citoyen)
    {
        $request->validate([
            'moyen_paiement' => 'required|string|in:wave,mtn_money,orange_money,moov_money',
        ]);

        // Créer le paiement
        $paiement = Paiement::create([
            'citoyen_id' => $citoyen->id,
            'moyen_paiement' => $request->moyen_paiement,
            'montant' => 500,
            // 'reference_paiement' => uniqid(),
            // 'utilise' => true
        ]);

        // Récupérer l'acte depuis la session
        $acteData = session('acte_a_payer');

        // Rediriger vers la page de téléchargement
        return redirect()->route('acte.download', [
            'type' => $acteData['type_acte'],
            'numero' => $acteData['numero_registre']
        ]);
    }

    // public function download($type, $numero)
    // {
    //     // Vérifier que le paiement a été effectué
    //     if (!session()->has('acte_a_payer')) {
    //         return redirect()->route('home')
    //             ->withErrors(['message' => 'Accès non autorisé']);
    //     }

    //     $acteData = session('acte_a_payer');
        
    //     // Nettoyer la session
    //     session()->forget('acte_a_payer');

    //     // Rediriger vers la page d'impression
    //     return redirect()->route('acte.imprimer', [
    //         'type' => $type,
    //         'numero' => $numero
    //     ]);
    // }

    public function download($type, $numero)
    {
        $acte = null;
        
        switch($type) {
            case 'naissance':
                $acte = ActeNaissance::where('numero_registre', $numero)->firstOrFail();
                break;
            case 'mariage':
                $acte = ActeMariage::where('numero_registre', $numero)->firstOrFail();
                break;
            case 'deces':
                $acte = ActeDeces::where('numero_registre', $numero)->firstOrFail();
                break;
            case 'divorce':
                $acte = ActeDivorce::where('numero_registre', $numero)->firstOrFail();
                break;
            default:
                abort(404);
        }

        return view('acte.download', compact('acte', 'type'));
    }
}