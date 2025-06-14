@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-orange-200">
            <!-- Header -->
            <div class="bg-orange-500 px-6 py-4 border-b border-orange-600">
                <h1 class="text-2xl font-bold text-white">Ajouter un acte de divorce</h1>
            </div>
            
            <!-- Form Container -->
            <div class="p-6">
                <form method="POST" action="{{ route('acte.divorce.store') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Numéro de registre -->
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label for="numero_registre" class="block text-sm font-medium text-gray-700">Numéro de registre</label>
                            <input type="text" id="numero_registre" name="numero_registre" value="{{ old('numero_registre') }}" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500" 
                                   required maxlength="5" pattern="[0-9]{5}" title="5 chiffres requis">
                            @error('numero_registre')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Informations ex-conjoint -->
                    <div class="border-t border-gray-200 pt-6">
                        <h2 class="text-lg font-medium text-orange-600 mb-4">Informations sur l'ex-conjoint</h2>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <label for="nom_ex_conjoint" class="block text-sm font-medium text-gray-700">Nom complet</label>
                                <input type="text" id="nom_ex_conjoint" name="nom_ex_conjoint" value="{{ old('nom_ex_conjoint') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                                @error('nom_ex_conjoint')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="date_naissance_ex_conjoint" class="block text-sm font-medium text-gray-700">Date de naissance</label>
                                <input type="date" id="date_naissance_ex_conjoint" name="date_naissance_ex_conjoint" value="{{ old('date_naissance_ex_conjoint') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                                @error('date_naissance_ex_conjoint')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="lieu_naissance_ex_conjoint" class="block text-sm font-medium text-gray-700">Lieu de naissance</label>
                                <input type="text" id="lieu_naissance_ex_conjoint" name="lieu_naissance_ex_conjoint" value="{{ old('lieu_naissance_ex_conjoint') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                                @error('lieu_naissance_ex_conjoint')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="domicile_ex_conjoint" class="block text-sm font-medium text-gray-700">Domicile</label>
                                <input type="text" id="domicile_ex_conjoint" name="domicile_ex_conjoint" value="{{ old('domicile_ex_conjoint') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                                @error('domicile_ex_conjoint')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- Informations ex-conjointe -->
                    <div class="border-t border-gray-200 pt-6">
                        <h2 class="text-lg font-medium text-orange-600 mb-4">Informations sur l'ex-conjointe</h2>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <label for="nom_ex_conjointe" class="block text-sm font-medium text-gray-700">Nom complet</label>
                                <input type="text" id="nom_ex_conjointe" name="nom_ex_conjointe" value="{{ old('nom_ex_conjointe') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                                @error('nom_ex_conjointe')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="date_naissance_ex_conjointe" class="block text-sm font-medium text-gray-700">Date de naissance</label>
                                <input type="date" id="date_naissance_ex_conjointe" name="date_naissance_ex_conjointe" value="{{ old('date_naissance_ex_conjointe') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                                @error('date_naissance_ex_conjointe')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="lieu_naissance_ex_conjointe" class="block text-sm font-medium text-gray-700">Lieu de naissance</label>
                                <input type="text" id="lieu_naissance_ex_conjointe" name="lieu_naissance_ex_conjointe" value="{{ old('lieu_naissance_ex_conjointe') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                                @error('lieu_naissance_ex_conjointe')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="domicile_ex_conjointe" class="block text-sm font-medium text-gray-700">Domicile</label>
                                <input type="text" id="domicile_ex_conjointe" name="domicile_ex_conjointe" value="{{ old('domicile_ex_conjointe') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                                @error('domicile_ex_conjointe')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- Informations sur le jugement -->
                    <div class="border-t border-gray-200 pt-6">
                        <h2 class="text-lg font-medium text-orange-600 mb-4">Informations sur le jugement</h2>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <label for="date_de_jugement" class="block text-sm font-medium text-gray-700">Date du jugement</label>
                                <input type="date" id="date_de_jugement" name="date_de_jugement" value="{{ old('date_de_jugement') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                                @error('date_de_jugement')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="date_de_delivrance_divorce" class="block text-sm font-medium text-gray-700">Date de delivrance du divorce</label>
                                <input type="date" id="date_de_delivrance_divorce" name="date_de_delivrance_divorce" value="{{ old('date_de_delivrance_divorce') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                                @error('date_de_delivrance_divorce')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- Boutons de soumission -->
                    <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                        <a href="{{ route('acte.divorce.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                            Annuler
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Enregistrer l'acte
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection