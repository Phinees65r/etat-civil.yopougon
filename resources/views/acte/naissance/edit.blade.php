@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <!-- En-tête avec couleur verte -->
                <div class="bg-green-700 px-6 py-4">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-semibold text-white">Modifier l'acte de naissance</h2>
                        <a href="{{ route('acte.naissance.index') }}" class="text-orange-300 hover:text-white transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Contenu du formulaire -->
                <div class="p-6">
                    <form method="POST" action="{{ route('acte.naissance.update', $acte) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <!-- Numéro registre -->
                            <div>
                                <label for="numero_registre" class="block text-sm font-medium text-green-800">Numéro de registre (5 chiffres)</label>
                                <input type="text" id="numero_registre" name="numero_registre" value="{{ old('numero_registre', $acte->numero_registre) }}" 
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                                       required>
                                @error('numero_registre')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Section enfant -->
                            <div class="sm:col-span-2 border-t border-green-200 pt-4 mt-2">
                                <h3 class="text-lg font-medium text-green-800 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                                    </svg>
                                    Informations sur l'enfant
                                </h3>
                            </div>

                            <div>
                                <label for="nom_enfant" class="block text-sm font-medium text-green-800">Nom de l'enfant</label>
                                <input type="text" id="nom_enfant" name="nom_enfant" value="{{ old('nom_enfant', $acte->nom_enfant) }}"
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                                       required>
                                @error('nom_enfant')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="prenom_enfant" class="block text-sm font-medium text-green-800">Prénom de l'enfant</label>
                                <input type="text" id="prenom_enfant" name="prenom_enfant" value="{{ old('prenom_enfant', $acte->prenom_enfant) }}"
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                                       required>
                                @error('prenom_enfant')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="sexe_enfant" class="block text-sm font-medium text-green-800">Sexe de l'enfant</label>
                                <select id="sexe_enfant" name="sexe_enfant"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                                        required>
                                    <option value="masculin" {{ old('sexe_enfant', $acte->sexe_enfant) == 'masculin' ? 'selected' : '' }}>Masculin</option>
                                    <option value="féminin" {{ old('sexe_enfant', $acte->sexe_enfant) == 'féminin' ? 'selected' : '' }}>Féminin</option>
                                </select>
                                @error('sexe_enfant')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="date_naissance" class="block text-sm font-medium text-green-800">Date de naissance</label>
                                <input type="date" id="date_naissance" name="date_naissance" value="{{ old('date_naissance', $acte->date_naissance->format('Y-m-d')) }}"
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                                       required>
                                @error('date_naissance')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="lieu_naissance" class="block text-sm font-medium text-green-800">Lieu de naissance</label>
                                <input type="text" id="lieu_naissance" name="lieu_naissance" value="{{ old('lieu_naissance', $acte->lieu_naissance) }}"
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                                       required>
                                @error('lieu_naissance')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="heure_de_naissance" class="block text-sm font-medium text-green-800">Heure de naissance</label>
                                <input type="time" id="heure_de_naissance" name="heure_de_naissance" value="{{ old('heure_de_naissance', $acte->heure_de_naissance) }}"
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                                       required>
                                @error('heure_de_naissance')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Section père -->
                            <div class="sm:col-span-2 border-t border-green-200 pt-4 mt-2">
                                <h3 class="text-lg font-medium text-green-800 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                    Informations sur le père
                                </h3>
                            </div>

                            <div>
                                <label for="nom_et_prenom_pere" class="block text-sm font-medium text-green-800">Nom et prénom</label>
                                <input type="text" id="nom_et_prenom_pere" name="nom_et_prenom_pere" value="{{ old('nom_et_prenom_pere', $acte->nom_et_prenom_pere) }}"
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                                       required>
                                @error('nom_et_prenom_pere')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Section mère -->
                            <div class="sm:col-span-2 border-t border-green-200 pt-4 mt-2">
                                <h3 class="text-lg font-medium text-green-800 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                    Informations sur la mère
                                </h3>
                            </div>

                            <div>
                                <label for="nom_et_prenom_mere" class="block text-sm font-medium text-green-800">Nom et prénom</label>
                                <input type="text" id="nom_et_prenom_mere" name="nom_et_prenom_mere" value="{{ old('nom_et_prenom_mere', $acte->nom_et_prenom_mere) }}"
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                                       required>
                                @error('nom_et_prenom_mere')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="date_declaration_naissance" class="block text-sm font-medium text-green-800">Date de déclaration de naissance</label>
                                <input type="date" id="date_declaration_naissance" name="date_declaration_naissance" value="{{ old('date_declaration_naissance', $acte->date_declaration_naissance->format('Y-m-d')) }}"
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                                       required>
                                @error('date_declaration_naissance')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end pt-6">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-orange-600 border border-transparent rounded-md font-semibold text-white hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h5a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h5v5.586l-1.293-1.293zM9 4a1 1 0 012 0v2H9V4z" />
                                </svg>
                                Mettre à jour l'acte
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection