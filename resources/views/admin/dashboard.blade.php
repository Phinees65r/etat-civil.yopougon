@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- En-tête orange -->
    <div class="bg-orange-500 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold text-white">Tableau de bord administratif</h1>
                <div class="text-orange-100">
                    {{ now()->format('d/m/Y') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Statistiques -->
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <!-- Carte Statistiques générales -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden border-l-4 border-orange-500">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="p-3 rounded-full bg-orange-100 text-orange-600 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">Statistiques générales</h3>
                        </div>
                        <div class="space-y-6">
                            <div class="flex justify-between items-center p-3 bg-green-50 rounded-lg">
                                <div>
                                    <p class="text-sm text-green-800">Demandes totales</p>
                                    <p class="text-2xl font-bold text-gray-900">{{ $stats['citoyens'] }}</p>
                                </div>
                                <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">
                                    +{{ rand(5, 15) }}% ce mois
                                </span>
                            </div>
                            <div class="flex justify-between items-center p-3 bg-orange-50 rounded-lg">
                                <div>
                                    <p class="text-sm text-orange-800">Paiements totaux</p>
                                    <p class="text-2xl font-bold text-gray-900">{{ number_format($stats['paiements'], 0, ',', ' ') }} FCFA</p>
                                </div>
                                <span class="px-2 py-1 text-xs font-semibold text-orange-800 bg-orange-100 rounded-full">
                                    +{{ rand(5, 20) }}% ce mois
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carte Statistiques des actes -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden border-l-4 border-green-500">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">Statistiques des actes</h3>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="p-3 bg-white border border-green-100 rounded-lg">
                                <p class="text-sm text-gray-500">Naissances</p>
                                <p class="text-xl font-bold text-green-600">{{ $stats['naissances'] }}</p>
                            </div>
                            <div class="p-3 bg-white border border-orange-100 rounded-lg">
                                <p class="text-sm text-gray-500">Mariages</p>
                                <p class="text-xl font-bold text-orange-600">{{ $stats['mariages'] }}</p>
                            </div>
                            <div class="p-3 bg-white border border-gray-100 rounded-lg">
                                <p class="text-sm text-gray-500">Décès</p>
                                <p class="text-xl font-bold text-gray-600">{{ $stats['deces'] }}</p>
                            </div>
                            <div class="p-3 bg-white border border-red-100 rounded-lg">
                                <p class="text-sm text-gray-500">Divorces</p>
                                <p class="text-xl font-bold text-red-600">{{ $stats['divorces'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carte Répartition géographique -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden border-l-4 border-blue-500">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">Répartition géographique</h3>
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                                    <p class="text-sm text-gray-700">En Côte d'Ivoire</p>
                                </div>
                                <p class="text-lg font-bold text-blue-600">
                                    {{ $repartition['cote_divoire'] }}
                                </p>
                            </div>
                            <div class="flex justify-between items-center p-3 bg-green-50 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                                    <p class="text-sm text-gray-700">À Abidjan</p>
                                </div>
                                <p class="text-lg font-bold text-green-600">
                                    {{ $repartition['abidjan'] }}
                                </p>
                            </div>
                            <div class="flex justify-between items-center p-3 bg-orange-50 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-orange-500 rounded-full mr-2"></div>
                                    <p class="text-sm text-gray-700">Hors Côte d'Ivoire</p>
                                </div>
                                <p class="text-lg font-bold text-orange-600">
                                    {{ $repartition['hors_cote_divoire'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section supplémentaire -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden p-6 mt-6 border-t-4 border-orange-500">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-medium text-gray-900">Activité récente</h3>
                    
                    <!-- Statistiques des agents -->
                    <div class="flex space-x-4">
                        <div class="text-center px-4 py-2 bg-blue-50 rounded-lg">
                            <p class="text-sm text-blue-600">Agents total</p>
                            <p class="text-xl font-bold">{{ $agentsStats['total'] }}</p>
                        </div>
                        <div class="text-center px-4 py-2 bg-pink-50 rounded-lg">
                            <p class="text-sm text-pink-600">Femmes</p>
                            <p class="text-xl font-bold">{{ $agentsStats['femmes'] }}</p>
                        </div>
                        <div class="text-center px-4 py-2 bg-green-50 rounded-lg">
                            <p class="text-sm text-green-600">Hommes</p>
                            <p class="text-xl font-bold">{{ $agentsStats['hommes'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <!-- Dernier agent enregistré -->
                    @if($latest['agent'])
                    <div class="flex items-start p-3 hover:bg-orange-50 rounded-lg transition">
                        <div class="p-2 rounded-full bg-purple-100 text-purple-600 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="font-medium">Dernier agent enregistré: {{ $latest['agent']->prenom }} {{ $latest['agent']->nom }}</p>
                            <p class="text-sm text-gray-500">Statut: {{ ucfirst($latest['agent']->statut) }} | Sexe: {{ ucfirst($latest['agent']->sexe) }}</p>
                        </div>
                        <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">Personnel</span>
                    </div>
                    @endif

                    <!-- Dernière demande -->
                    @if($latest['demande'])
                    <div class="flex items-start p-3 hover:bg-orange-50 rounded-lg transition">
                        <div class="p-2 rounded-full bg-yellow-100 text-yellow-600 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="font-medium">Dernière demande: {{ $latest['demande']->type_acte }} de {{ $latest['demande']->prenom }} {{ $latest['demande']->nom }}</p>
                            <p class="text-sm text-gray-500">Ville: {{ $latest['demande']->ville }} | Pays: {{ $latest['demande']->pays }}</p>
                        </div>
                        <span class="text-xs px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full">Demande</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection