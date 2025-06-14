<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Citoyen;
use App\Models\Paiement;
use App\Models\ActeNaissance;
use App\Models\ActeMariage;
use App\Models\ActeDeces;
use App\Models\ActeDivorce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function dashboard()
    {
        
        $stats = [
            'citoyens' => Citoyen::count(),
            'paiements' => Paiement::sum('montant'),
            'naissances' => ActeNaissance::count(),
            'mariages' => ActeMariage::count(),
            'deces' => ActeDeces::count(),
            'divorces' => ActeDivorce::count(),
        ];

        
        $repartition = [
            'cote_divoire' => Citoyen::where('pays', "Côte d'Ivoire")->count(),
            'abidjan' => Citoyen::where('ville', 'Abidjan')->count(),
            'hors_cote_divoire' => Citoyen::where('pays', '!=', "Côte d'Ivoire")->count(),
        ];

        
        $agentsStats = [
            'total' => User::whereIn('statut', ['agent', 'admin'])->count(),
            'femmes' => User::where('sexe', 'femme')->whereIn('statut', ['agent', 'admin'])->count(),
            'hommes' => User::where('sexe', 'homme')->whereIn('statut', ['agent', 'admin'])->count(),
        ];

        
        $latest = [
            'agent' => User::whereIn('statut', ['agent', 'admin'])->latest()->first(),
            'demande' => Citoyen::latest()->first(),
        ];

        return view('admin.dashboard', compact('stats','repartition', 'agentsStats', 'latest'));
    }

    public function agentsIndex()
    {
        $agents = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.agents.index', compact('agents'));
    }

    public function agentsCreate()
    {
        return view('admin.agents.create');
    }

    public function agentsStore(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'telephone' => 'required|string|max:20',
            'sexe' => 'required|string|in:homme,femme',
            'adresse' => 'required|string|max:255',
            'statut' => 'required|string|in:agent,admin',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('admin.agents.index')->with('success', 'Agent créé avec succès.');
    }

    public function agentsEdit(User $agent)
    {
        return view('admin.agents.edit', compact('agent'));
    }

    public function agentsUpdate(Request $request, User $agent)
    {
        $rules = [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$agent->id,
            'telephone' => 'required|string|max:20',
            'sexe' => 'required|string|in:homme,femme',
            'adresse' => 'required|string|max:255',
            'statut' => 'required|string|in:agent,admin',
        ];

        if ($request->password) {
            $rules['password'] = 'required|string|min:8|confirmed';
        }

        $validated = $request->validate($rules);

        if ($request->password) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $agent->update($validated);

        return redirect()->route('admin.agents.index')->with('success', 'Agent mis à jour avec succès.');
    }

    public function agentsDestroy(User $agent)
    {
        $agent->delete();
        return redirect()->route('admin.agents.index')->with('success', 'Agent supprimé avec succès.');
    }
}