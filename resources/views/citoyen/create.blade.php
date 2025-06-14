<x-guest-layout>
    <div class="min-h-screen bg-white py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md mx-auto bg-white rounded-2xl shadow-lg overflow-hidden md:max-w-2xl p-8 border border-orange-100">
            <!-- En-tête avec accent orange -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-orange-600">Formulaire de demande</h2>
                <p class="mt-3 text-lg text-gray-600">Veuillez remplir ce formulaire pour faire votre demande d'acte</p>
                <div class="mt-4 h-1 bg-gradient-to-r from-orange-400 to-green-500 rounded-full"></div>
            </div>

            <form method="POST" action="{{ route('citoyen.store') }}" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <!-- Nom -->
                    <div>
                        <x-input-label for="nom" :value="__('Nom')" class="text-gray-700 font-medium" />
                        <x-text-input 
                            id="nom" 
                            class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50 transition duration-200 px-4 py-2 border" 
                            type="text" 
                            name="nom" 
                            :value="old('nom')" 
                            required 
                            autofocus 
                        />
                        <x-input-error :messages="$errors->get('nom')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <!-- Prénom -->
                    <div>
                        <x-input-label for="prenom" :value="__('Prénom')" class="text-gray-700 font-medium" />
                        <x-text-input 
                            id="prenom" 
                            class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50 transition duration-200 px-4 py-2 border" 
                            type="text" 
                            name="prenom" 
                            :value="old('prenom')" 
                            required 
                        />
                        <x-input-error :messages="$errors->get('prenom')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <!-- Email -->
                    <div class="sm:col-span-2">
                        <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-medium" />
                        <x-text-input 
                            id="email" 
                            class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50 transition duration-200 px-4 py-2 border" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required 
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <!-- Téléphone -->
                    <div class="sm:col-span-2">
                        <x-input-label for="telephone" :value="__('Téléphone')" class="text-gray-700 font-medium" />
                        <x-text-input 
                            id="telephone" 
                            class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50 transition duration-200 px-4 py-2 border" 
                            type="tel" 
                            name="telephone" 
                            :value="old('telephone')" 
                            required 
                        />
                        <x-input-error :messages="$errors->get('telephone')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <!-- Sexe -->
                    <div>
                        <x-input-label for="sexe" :value="__('Sexe')" class="text-gray-700 font-medium" />
                        <select 
                            id="sexe" 
                            name="sexe" 
                            class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50 transition duration-200 px-4 py-2 border text-gray-700" 
                            required
                        >
                            <option value="">Sélectionnez...</option>
                            <option value="homme" {{ old('sexe') == 'homme' ? 'selected' : '' }}>Homme</option>
                            <option value="femme" {{ old('sexe') == 'femme' ? 'selected' : '' }}>Femme</option>
                        </select>
                        <x-input-error :messages="$errors->get('sexe')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <!-- Type d'acte -->
                    <div>
                        <x-input-label for="type_acte" :value="__('Type d\'acte')" class="text-gray-700 font-medium" />
                        <select 
                            id="type_acte" 
                            name="type_acte" 
                            class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50 transition duration-200 px-4 py-2 border text-gray-700" 
                            required
                        >
                            <option value="">Sélectionnez...</option>
                            <option value="naissance" {{ old('type_acte') == 'naissance' ? 'selected' : '' }}>Acte de naissance</option>
                            <option value="mariage" {{ old('type_acte') == 'mariage' ? 'selected' : '' }}>Acte de mariage</option>
                            <option value="deces" {{ old('type_acte') == 'deces' ? 'selected' : '' }}>Acte de décès</option>
                            <option value="divorce" {{ old('type_acte') == 'divorce' ? 'selected' : '' }}>Acte de divorce</option>
                        </select>
                        <x-input-error :messages="$errors->get('type_acte')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <!-- Pays -->
                    <div>
                        <x-input-label for="pays" :value="__('Pays')" class="text-gray-700 font-medium" />
                        <x-text-input 
                            id="pays" 
                            class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50 transition duration-200 px-4 py-2 border" 
                            type="text" 
                            name="pays" 
                            :value="old('pays')" 
                            required 
                        />
                        <x-input-error :messages="$errors->get('pays')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <!-- Ville -->
                    <div>
                        <x-input-label for="ville" :value="__('Ville')" class="text-gray-700 font-medium" />
                        <x-text-input 
                            id="ville" 
                            class="block mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50 transition duration-200 px-4 py-2 border" 
                            type="text" 
                            name="ville" 
                            :value="old('ville')" 
                            required 
                        />
                        <x-input-error :messages="$errors->get('ville')" class="mt-2 text-sm text-red-600" />
                    </div>
                </div>

                <!-- Bouton avec dégradé orange-vert -->
                <div class="flex items-center justify-center mt-8">
                    <button
                        type="submit"
                        class="w-full md:w-auto px-8 py-3 bg-gradient-to-r from-orange-500 to-green-500 hover:from-orange-600 hover:to-green-600 text-white font-bold rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:-translate-y-1"
                    >
                        {{ __('Continuer') }}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>