<x-guest-layout>
    <div class="min-h-screen bg-white py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg overflow-hidden p-8 border border-orange-100">
            <!-- En-tête avec accent orange -->
            <div class="text-center mb-8">
                <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-orange-100 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-extrabold text-orange-600">Vérification de votre acte</h2>
                <p class="mt-3 text-lg text-gray-600">Veuillez vérifier les informations ci-dessous avant de procéder au paiement</p>
                <div class="mt-4 h-1 bg-gradient-to-r from-orange-400 to-green-500 rounded-full w-32 mx-auto"></div>
            </div>

            <!-- Carte des détails de l'acte -->
            <div class="mb-8 p-6 border border-green-100 rounded-xl bg-green-50">
                <h3 class="text-xl font-semibold text-green-800 mb-4">Détails de l'acte</h3>
                
                <!-- Affichage des détails selon le type -->
                @if($type == 'naissance')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Nom complet</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->nom_enfant }} {{ $acte->prenom_enfant }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Sexe</p>
                            <p class="text-lg font-semibold text-gray-900">{{ ucfirst($acte->sexe_enfant) }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Date de naissance</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->date_naissance->format('d/m/Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Heure de naissance</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->heure_de_naissance }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Lieu de naissance</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->lieu_naissance }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Nom du père</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->nom_et_prenom_pere }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Nom de la mère</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->nom_et_prenom_mere }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Date de déclaration</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->date_declaration_naissance->format('d/m/Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Numéro de registre</p>
                            <p class="text-lg font-semibold text-orange-600">{{ $acte->numero_registre }}</p>
                        </div>
                    </div>

                @elseif($type == 'mariage')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <p class="text-sm font-medium text-gray-500">Numéro de registre</p>
                            <p class="text-lg font-semibold text-orange-600">{{ $acte->numero_registre }}</p>
                        </div>

                        <div class="md:col-span-2 border-t pt-4 mt-2">
                            <h4 class="font-medium text-gray-700 mb-2">Informations sur l'époux</h4>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Nom complet</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->nom_epoux }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Date de naissance</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->date_naissance_epoux->format('d/m/Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Lieu de naissance</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->lieu_naissance_epoux }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Profession</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->epoux_profession }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Domicile</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->domicile_epoux }}</p>
                        </div>

                        <div class="md:col-span-2 border-t pt-4 mt-2">
                            <h4 class="font-medium text-gray-700 mb-2">Informations sur l'épouse</h4>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Nom complet</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->nom_epouse }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Date de naissance</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->date_naissance_epouse->format('d/m/Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Lieu de naissance</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->lieu_naissance_epouse }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Profession</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->epouse_profession }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Domicile</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->domicile_epouse }}</p>
                        </div>

                        <div class="md:col-span-2 border-t pt-4 mt-2">
                            <h4 class="font-medium text-gray-700 mb-2">Informations sur le mariage</h4>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Date du mariage</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->date_mariage->format('d/m/Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Heure du mariage</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->heure_mariage ?? 'Non précisée' }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Lieu du mariage</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->lieu_mariage }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Régime matrimonial</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->type_regime }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Date de déclaration</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->date_declaration_mariage }}</p>
                        </div>
                    </div>

                @elseif($type == 'deces')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <p class="text-sm font-medium text-gray-500">Numéro de registre</p>
                            <p class="text-lg font-semibold text-orange-600">{{ $acte->numero_registre }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Nom du défunt</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->nom_defunt }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Sexe</p>
                            <p class="text-lg font-semibold text-gray-900">{{ ucfirst($acte->sexe_defunt) }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Date de décès</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->date_deces->format('d/m/Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Heure de décès</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->heure_deces }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Lieu de décès</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->lieu_deces }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Date de naissance</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->date_de_naissance_du_defunt->format('d/m/Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Lieu de naissance</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->lieu_de_naissance_du_defunt }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Dernier domicile</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->defunt_domicile }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Nom du père</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->nom_pere_defunt }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Nom de la mère</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->nom_mere_defunt }}</p>
                        </div>
                        @if($acte->nom_dernier_conjoint)
                        <div>
                            <p class="text-sm font-medium text-gray-500">Dernier conjoint</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->nom_dernier_conjoint }} {{ $acte->prenom_dernier_conjoint }}</p>
                        </div>
                        @endif
                        <div>
                            <p class="text-sm font-medium text-gray-500">Date de délivrance</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->date_de_delivrance_deces->format('d/m/Y') }}</p>
                        </div>
                    </div>

                @elseif($type == 'divorce')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <p class="text-sm font-medium text-gray-500">Numéro de registre</p>
                            <p class="text-lg font-semibold text-orange-600">{{ $acte->numero_registre }}</p>
                        </div>

                        <div class="md:col-span-2 border-t pt-4 mt-2">
                            <h4 class="font-medium text-gray-700 mb-2">Informations sur l'ex-conjoint</h4>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Nom complet</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->nom_ex_conjoint }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Date de naissance</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->date_naissance_ex_conjoint->format('d/m/Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Lieu de naissance</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->lieu_naissance_ex_conjoint }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Domicile</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->domicile_ex_conjoint }}</p>
                        </div>

                        <div class="md:col-span-2 border-t pt-4 mt-2">
                            <h4 class="font-medium text-gray-700 mb-2">Informations sur l'ex-conjointe</h4>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Nom complet</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->nom_ex_conjointe }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Date de naissance</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->date_naissance_ex_conjointe->format('d/m/Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Lieu de naissance</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->lieu_naissance_ex_conjointe }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Domicile</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->domicile_ex_conjointe }}</p>
                        </div>

                        <div class="md:col-span-2 border-t pt-4 mt-2">
                            <h4 class="font-medium text-gray-700 mb-2">Informations sur le divorce</h4>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Date du jugement</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->date_de_jugement->format('d/m/Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Date de délivrance</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $acte->date_de_delivrance_divorce->format('d/m/Y') }}</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Avertissement avec style orange -->
            <div class="bg-orange-50 border-l-4 border-orange-400 p-4 mb-8 rounded-r-lg">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-orange-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-orange-800">Important</h3>
                        <p class="text-sm text-orange-700 mt-1">
                            Veuillez vérifier attentivement les informations ci-dessus. Après paiement, vous pourrez télécharger l'acte.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Bouton de paiement avec dégradé orange-vert -->
            <div class="flex justify-center">
                <a href="{{ route('paiement.create', ['citoyen' => $citoyen->id]) }}" 
                   class="inline-flex items-center px-8 py-3 border border-transparent text-lg font-bold rounded-lg shadow-sm text-white bg-gradient-to-r from-orange-500 to-green-500 hover:from-orange-600 hover:to-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition duration-300 transform hover:-translate-y-0.5">
                    Procéder au paiement
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>