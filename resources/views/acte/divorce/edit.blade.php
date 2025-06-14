@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-orange-200">
            <!-- Header with orange background -->
            <div class="bg-orange-500 px-6 py-4 border-b border-orange-600">
                <h2 class="text-2xl font-bold text-white">
                    <i class="fas fa-edit mr-2"></i>{{ __('Modifier un acte de divorce') }}
                </h2>
            </div>

            <div class="p-6">
                <form method="POST" action="{{ route('acte.divorce.update', $acte) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <!-- Numéro registre -->
                        <div>
                            <label for="numero_registre" class="block text-sm font-medium text-gray-700">
                                {{ __('Numéro de registre (5 chiffres)') }}
                                <span class="text-orange-500">*</span>
                            </label>
                            <input id="numero_registre" name="numero_registre" type="text" 
                                   value="{{ old('numero_registre', $acte->numero_registre) }}" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
                                   required maxlength="5" pattern="[0-9]{5}" title="5 chiffres requis">
                            @error('numero_registre')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Section époux -->
                        <div class="sm:col-span-2 pt-4 mt-4 border-t border-orange-200">
                            <h3 class="text-lg font-medium text-orange-700">
                                <i class="fas fa-user mr-2"></i>{{ __('Informations sur l\'époux') }}
                            </h3>
                        </div>

                        <div>
                            <label for="nom_ex_conjoint" class="block text-sm font-medium text-gray-700">
                                {{ __('Nom complet') }} <span class="text-orange-500">*</span>
                            </label>
                            <input id="nom_ex_conjoint" name="nom_ex_conjoint" type="text" 
                                   value="{{ old('nom_ex_conjoint', $acte->nom_ex_conjoint) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200"
                                   required>
                            @error('nom_ex_conjoint')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="date_naissance_ex_conjoint" class="block text-sm font-medium text-gray-700">
                                {{ __('Date de naissance') }} <span class="text-orange-500">*</span>
                            </label>
                            <input id="date_naissance_ex_conjoint" name="date_naissance_ex_conjoint" type="date" 
                                   value="{{ old('date_naissance_ex_conjoint', $acte->date_naissance_ex_conjoint) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200"
                                   required>
                            @error('date_naissance_ex_conjoint')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="lieu_naissance_ex_conjoint" class="block text-sm font-medium text-gray-700">
                                {{ __('Lieu de naissance') }} <span class="text-orange-500">*</span>
                            </label>
                            <input id="lieu_naissance_ex_conjoint" name="lieu_naissance_ex_conjoint" type="text" 
                                   value="{{ old('lieu_naissance_ex_conjoint', $acte->lieu_naissance_ex_conjoint) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200"
                                   required>
                            @error('lieu_naissance_ex_conjoint')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="domicile_ex_conjoint" class="block text-sm font-medium text-gray-700">
                                {{ __('Domicile') }} <span class="text-orange-500">*</span>
                            </label>
                            <input id="domicile_ex_conjoint" name="domicile_ex_conjoint" type="text" 
                                   value="{{ old('domicile_ex_conjoint', $acte->domicile_ex_conjoint) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200"
                                   required>
                            @error('domicile_ex_conjoint')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Section épouse -->
                        <div class="sm:col-span-2 pt-4 mt-4 border-t border-orange-200">
                            <h3 class="text-lg font-medium text-orange-700">
                                <i class="fas fa-user mr-2"></i>{{ __('Informations sur l\'épouse') }}
                            </h3>
                        </div>

                        <div>
                            <label for="nom_ex_conjointe" class="block text-sm font-medium text-gray-700">
                                {{ __('Nom complet') }} <span class="text-orange-500">*</span>
                            </label>
                            <input id="nom_ex_conjointe" name="nom_ex_conjointe" type="text" 
                                   value="{{ old('nom_ex_conjointe', $acte->nom_ex_conjointe) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200"
                                   required>
                            @error('nom_ex_conjointe')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="date_naissance_ex_conjointe" class="block text-sm font-medium text-gray-700">
                                {{ __('Date de naissance') }} <span class="text-orange-500">*</span>
                            </label>
                            <input id="date_naissance_ex_conjointe" name="date_naissance_ex_conjointe" type="date" 
                                   value="{{ old('date_naissance_ex_conjointe', $acte->date_naissance_ex_conjointe) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200"
                                   required>
                            @error('date_naissance_ex_conjointe')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="lieu_naissance_ex_conjointe" class="block text-sm font-medium text-gray-700">
                                {{ __('Lieu de naissance') }} <span class="text-orange-500">*</span>
                            </label>
                            <input id="lieu_naissance_ex_conjointe" name="lieu_naissance_ex_conjointe" type="text" 
                                   value="{{ old('lieu_naissance_ex_conjointe', $acte->lieu_naissance_ex_conjointe) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200"
                                   required>
                            @error('lieu_naissance_ex_conjointe')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="domicile_ex_conjointe" class="block text-sm font-medium text-gray-700">
                                {{ __('Domicile') }} <span class="text-orange-500">*</span>
                            </label>
                            <input id="domicile_ex_conjointe" name="domicile_ex_conjointe" type="text" 
                                   value="{{ old('domicile_ex_conjointe', $acte->domicile_ex_conjointe) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200"
                                   required>
                            @error('domicile_ex_conjointe')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Section divorce -->
                        <div class="sm:col-span-2 pt-4 mt-4 border-t border-orange-200">
                            <h3 class="text-lg font-medium text-orange-700">
                                <i class="fas fa-gavel mr-2"></i>{{ __('Informations sur le divorce') }}
                            </h3>
                        </div>

                        <div>
                            <label for="date_de_jugement" class="block text-sm font-medium text-gray-700">
                                {{ __('Date du jugement') }} <span class="text-orange-500">*</span>
                            </label>
                            <input id="date_de_jugement" name="date_de_jugement" type="date" 
                                   value="{{ old('date_de_jugement', $acte->date_de_jugement) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200"
                                   required>
                            @error('date_de_jugement')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="date_de_delivrance_divorce" class="block text-sm font-medium text-gray-700">
                                {{ __('Date de délivrance') }} <span class="text-orange-500">*</span>
                            </label>
                            <input id="date_de_delivrance_divorce" name="date_de_delivrance_divorce" type="date" 
                                   value="{{ old('date_de_delivrance_divorce', $acte->date_de_delivrance_divorce) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200"
                                   required>
                            @error('date_de_delivrance_divorce')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-8 space-x-4">
                        <a href="{{ route('acte.divorce.index') }}" 
                           class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-gray-700 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors">
                            <i class="fas fa-times mr-2"></i>{{ __('Annuler') }}
                        </a>
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors">
                            <i class="fas fa-save mr-2"></i>{{ __('Mettre à jour') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection