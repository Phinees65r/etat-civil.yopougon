<?php

namespace App\Http\Controllers;

use App\Models\ActeDeces;
use App\Models\ActeDivorce;
use App\Models\ActeMariage;
use App\Models\ActeNaissance;
use Illuminate\Http\Request;

class ActeController extends Controller
{
    public function index()
    {
        return view('acte.index');
    }

    // Naissance
    public function naissanceIndex()
    {
        $actes = ActeNaissance::orderBy('created_at', 'desc')->paginate(10);
        return view('acte.naissance.index', compact('actes'));
    }

    public function naissanceCreate()
    {
        return view('acte.naissance.create');
    }

    public function naissanceStore(Request $request)
    {
        $validated = $request->validate([
            'numero_registre' => 'required|string|size:5|unique:acte_naissances',
            'nom_enfant' => 'required|string|max:255',
            'prenom_enfant' => 'required|string|max:255',
            'sexe_enfant' => 'required|in:masculin,féminin',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string|max:255',
            'heure_de_naissance' => 'required|date_format:H:i',
            'nom_et_prenom_pere' => 'required|string|max:255',
            // 'pere_profession' => 'required|string|max:255',
            // 'pere_domicile' => 'required|string|max:255',
            'nom_et_prenom_mere' => 'required|string|max:255',
            // 'mere_profession' => 'required|string|max:255',
            // 'mere_domicile' => 'required|string|max:255',
            'date_declaration_naissance' => 'required|date',
        ]);

        ActeNaissance::create($validated);

        return redirect()->route('acte.naissance.index')->with('success', 'Acte de naissance créé avec succès.');
    }

    public function naissanceEdit(ActeNaissance $acte)
    {
        return view('acte.naissance.edit', compact('acte'));
    }

    public function naissanceUpdate(Request $request, ActeNaissance $acte)
    {
        $validated = $request->validate([
            'numero_registre' => 'required|string|size:5|unique:acte_naissances,numero_registre,' . $acte->id,
            'nom_enfant' => 'required|string|max:255',
            'prenom_enfant' => 'required|string|max:255',
            'sexe_enfant' => 'required|in:masculin,féminin',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string|max:255',
            'heure_de_naissance' => 'required|date_format:H:i',
            'nom_et_prenom_pere' => 'required|string|max:255',
            // 'pere_profession' => 'required|string|max:255',
            // 'pere_domicile' => 'required|string|max:255',
            'nom_et_prenom_mere' => 'required|string|max:255',
            // 'mere_profession' => 'required|string|max:255',
            // 'mere_domicile' => 'required|string|max:255',
            'date_declaration_naissance' => 'required|date',
        ]);

        $acte->update($validated);

        return redirect()->route('acte.naissance.index')->with('success', 'Acte de naissance mis à jour avec succès.');
    }

    public function naissanceDestroy(ActeNaissance $acte)
    {
        $acte->delete();
        return redirect()->route('acte.naissance.index')->with('success', 'Acte de naissance supprimé avec succès.');
    }

    // Mariage
    public function mariageIndex()
    {
        $actes = ActeMariage::orderBy('created_at', 'desc')->paginate(10);
        return view('acte.mariage.index', compact('actes'));
    }

    public function mariageCreate()
    {
        return view('acte.mariage.create');
    }

    public function mariageStore(Request $request)
    {
        $validated = $request->validate([
            'numero_registre' => 'required|string|size:5|unique:acte_mariages',
            'nom_epoux' => 'required|string|max:255',
            'epoux_profession' => 'required|string|max:255',
            'domicile_epoux' => 'required|string|max:255',
            'date_naissance_epoux' => 'required|date',
            'lieu_naissance_epoux' => 'required|string|max:255',
            // 'epoux_nationalite' => 'required|string|max:255',

            // 'nom_pere_epoux' => 'required|string|max:255',
            // 'pere_profession' => 'required|string|max:255',
            // 'domicile_pere' => 'required|string|max:255',
            // 'nom_mere_epoux' => 'required|string|max:255',
            // 'mere_profession' => 'required|string|max:255',
            // 'domicile_mere' => 'required|string|max:255',

            'nom_epouse' => 'required|string|max:255',
            'epouse_profession' => 'required|string|max:255',
            'domicile_epouse' => 'required|string|max:255',
            'date_naissance_epouse' => 'required|date',
            'lieu_naissance_epouse' => 'required|string|max:255',
            // 'nom_pere_epouse' => 'required|string|max:255',
            // 'nom_mere_epouse' => 'required|string|max:255',
            // 'epouse_nationalite' => 'required|string|max:255',

            'date_mariage' => 'required|date',
            'heure_mariage' => 'nullable',
            'lieu_mariage' => 'required|string|max:255',
            'type_regime' => 'required|string|',

            // 'temoin_epoux_nom' => 'required|string|max:255',
            // 'temoin_epoux_profession' => 'required|string|max:255',
            // 'temoin_epoux_domicile' => 'required|string|max:255',

            // 'temoin_epouse_nom' => 'required|string|max:255',
            // 'temoin_epouse_profession' => 'required|string|max:255',
            // 'temoin_epouse_domicile' => 'required|string|max:255',
            'date_declaration_mariage' => 'required|date',
        ]);

        ActeMariage::create($validated);

        return redirect()->route('acte.mariage.index')->with('success', 'Acte de mariage créé avec succès.');
    }

    public function mariageEdit(ActeMariage $acte)
    {
        return view('acte.mariage.edit', compact('acte'));
    }

    public function mariageUpdate(Request $request, ActeMariage $acte)
    {
        $validated = $request->validate([
            'numero_registre' => 'required|string|size:5|unique:acte_mariages,numero_registre,' . $acte->id,

            'nom_epoux' => 'required|string|max:255',
            'epoux_profession' => 'required|string|max:255',
            'domicile_epoux' => 'required|string|max:255',
            'date_naissance_epoux' => 'required|date',
            'lieu_naissance_epoux' => 'required|string|max:255',
            // 'epoux_nationalite' => 'required|string|max:255',

            'nom_pere_epoux' => 'required|string|max:255',
            'pere_profession' => 'required|string|max:255',
            'domicile_pere' => 'required|string|max:255',
            'nom_mere_epoux' => 'required|string|max:255',
            'mere_profession' => 'required|string|max:255',
            'domicile_mere' => 'required|string|max:255',

            'nom_epouse' => 'required|string|max:255',
            'epouse_profession' => 'required|string|max:255',
            'domicile_epouse' => 'required|string|max:255',
            'date_naissance_epouse' => 'required|date',
            'lieu_naissance_epouse' => 'required|string|max:255',
            'nom_pere_epouse' => 'required|string|max:255',
            'nom_mere_epouse' => 'required|string|max:255',
            // 'epouse_nationalite' => 'required|string|max:255',

            'date_mariage' => 'required|date',
            'heure_mariage' => 'nullable',
            'lieu_mariage' => 'required|string|max:255',
            'type_regime' => 'required|string',

            // 'temoin_epoux_nom' => 'required|string|max:255',
            // 'temoin_epoux_profession' => 'required|string|max:255',
            // 'temoin_epoux_domicile' => 'required|string|max:255',

            // 'temoin_epouse_nom' => 'required|string|max:255',
            // 'temoin_epouse_profession' => 'required|string|max:255',
            // 'temoin_epouse_domicile' => 'required|string|max:255',
            'date_declaration_mariage' => 'required|date',
        ]);

        $acte->update($validated);

        return redirect()->route('acte.mariage.index')->with('success', 'Acte de mariage mis à jour avec succès.');
    }

    public function mariageDestroy(ActeMariage $acte)
    {
        $acte->delete();
        return redirect()->route('acte.mariage.index')->with('success', 'Acte de mariage supprimé avec succès.');
    }

    // Divorce
    public function divorceIndex()
    {
        $actes = ActeDivorce::orderBy('created_at', 'desc')->paginate(10);
        return view('acte.divorce.index', compact('actes'));
    }

    public function divorceCreate()
    {
        return view('acte.divorce.create');
    }

    public function divorceStore(Request $request)
    {
        $validated = $request->validate([
            'numero_registre' => 'required|string|size:5|unique:acte_divorces',
            'nom_ex_conjoint' => 'required|string|max:255',
            'date_naissance_ex_conjoint' => 'required|date',
            'lieu_naissance_ex_conjoint' => 'required|string|max:255',
            'domicile_ex_conjoint' => 'required|string|max:255',

            'nom_ex_conjointe' => 'required|string|max:255',
            'date_naissance_ex_conjointe' => 'required|date',
            'lieu_naissance_ex_conjointe' => 'required|string|max:255',
            'domicile_ex_conjointe' => 'required|string|max:255',

            'date_de_jugement' => 'required|date',
            // 'lieu_de_jugement' => 'required|string|max:255',
            'date_de_delivrance_divorce' => 'required|date',
        ]);

        ActeDivorce::create($validated);

        return redirect()->route('acte.divorce.index')->with('success', 'Acte de divorce créé avec succès.');
    }

    public function divorceEdit(ActeDivorce $acte)
    {
        return view('acte.divorce.edit', compact('acte'));
    }

    public function divorceUpdate(Request $request, ActeDivorce $acte)
    {
        $validated = $request->validate([
            'numero_registre' => 'required|string|size:5|unique:acte_divorces,numero_registre,'.$acte->id,
            'nom_ex_conjoint' => 'required|string|max:255',
            'date_naissance_ex_conjoint' => 'required|date',
            'lieu_naissance_ex_conjoint' => 'required|string|max:255',
            'domicile_ex_conjoint' => 'required|string|max:255',
            'nom_ex_conjointe' => 'required|string|max:255',
            'date_naissance_ex_conjointe' => 'required|date',
            'lieu_naissance_ex_conjointe' => 'required|string|max:255',
            'domicile_ex_conjointe' => 'required|string|max:255',
            'date_de_jugement' => 'required|date',
            // 'lieu_de_jugement' => 'required|string|max:255',
            'date_de_delivrance_divorce' => 'required|date',
        ]);

        $acte->update($validated);

        return redirect()->route('acte.divorce.index')->with('success', 'Acte de divorce mis à jour avec succès.');
    }

    public function divorceDestroy(ActeDivorce $acte)
    {
        $acte->delete();
        return redirect()->route('acte.divorce.index')->with('success', 'Acte de divorce supprimé avec succès.');
    }

    // Deces
    public function decesIndex()
    {
        $actes = ActeDeces::orderBy('created_at', 'desc')->paginate(10);
        return view('acte.deces.index', compact('actes'));
    }

    public function decesCreate()
    {
        return view('acte.deces.create');
    }

    public function decesStore(Request $request)
    {
        $validated = $request->validate([
            'numero_registre' => 'required|string|size:5|unique:acte_deces',
            'nom_defunt' => 'required|string|max:255',
            'date_deces' => 'required|date',
            'heure_deces' => 'required|date_format:H:i',
            'lieu_deces' => 'required|string|max:255',
            // 'cause_deces' => 'required|string|max:255',
            'date_de_naissance_du_defunt' => 'required|date',
            'lieu_de_naissance_du_defunt' => 'required|string|max:255',
            'sexe_defunt' => 'required|in:masculin,féminin',
            'nom_dernier_conjoint' => 'required|string|max:255',
            'prenom_dernier_conjoint' => 'required|string|max:255',
            'nom_pere_defunt' => 'required|string|max:255',
            'nom_mere_defunt' => 'required|string|max:255',
            // 'declarant_nom' => 'required|string|max:255',
            // 'declarant_profession' => 'required|string|max:255',
            'defunt_domicile' => 'required|string|max:255',
            'date_de_delivrance_deces' => 'required|date',
        ]);

        ActeDeces::create($validated);

        return redirect()->route('acte.deces.index')->with('success', 'Acte de deces créé avec succès.');
    }

    public function decesEdit(ActeDeces $acte)
    {
        return view('acte.deces.edit', compact('acte'));
    }

    public function decesUpdate(Request $request, ActeDeces $acte)
    {
        $validated = $request->validate([
            'numero_registre' => 'required|string|size:5|unique:acte_deces,numero_registre,' . $acte->id,
            'nom_defunt' => 'required|string|max:255',
            'date_deces' => 'required|date',
            'heure_deces' => 'required|date_format:H:i',
            'lieu_deces' => 'required|string|max:255',
            'cause_deces' => 'required|string|max:255',
            'date_de_naissance_du_defunt' => 'required|date',
            'lieu_de_naissance_du_defunt' => 'required|string|max:255',
            'sexe_defunt' => 'required|in:masculin,féminin',
            'nom_dernier_conjoint' => 'required|string|max:255',
            'prenom_dernier_conjoint' => 'required|string|max:255',
            'nom_pere_defunt' => 'required|string|max:255',
            'nom_mere_defunt' => 'required|string|max:255',
            // 'declarant_nom' => 'required|string|max:255',
            // 'declarant_prenom' => 'required|string|max:255',
            // 'declarant_profession' => 'required|string|max:255',
            'defunt_domicile' => 'required|string|max:255',
            'date_de_delivrance_deces' => 'required|date',
        ]);

        $acte->update($validated);

        return redirect()->route('acte.deces.index')->with('success', 'Acte de deces mis à jour avec succès.');
    }

    public function decesDestroy(ActeDeces $acte)
    {
        $acte->delete();
        return redirect()->route('acte.deces.index')->with('success', 'Acte de deces supprimé avec succès.');
    }

    public function show($type, $numero)
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

        // Vérifier que le paiement a été effectué
        if (!session()->has('acte_verifie')) {
            return redirect()->route('citoyen.registre')
                ->withErrors(['message' => "Veuillez d'abord vérifier votre numéro de registre et effectuer le paiement"]);
        }

        return view('acte.show', compact('acte', 'type'));
    }
}